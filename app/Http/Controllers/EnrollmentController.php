<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Registry;
use App\Services\Document;

class EnrollmentController extends Controller
{
    public function create(Course $course)
    {
        return view('enrollment.create', [
            'course' => $course,
            'enrolledType' => session()->get('enrolledType', 'null'),
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $registry = user()->enroll($course);
        
        $data = $request->validate([
            'date' => ['required', 'date'],
            'ref' => ['nullable', 'integer', 'numeric'],
            'amount' => ['required', 'integer', 'numeric'],
            'type' => ['required', 'in:movil,transfer,dollars,bs'],
        ]);

        $data['registry_id'] = $registry->id;

        $payment = Payment::create($data);

        return redirect()->route('enrollment.create', $course->id)->with('enrolledType', $payment->type);
    }

    public function download(Registry $registry)
    {
        $student = $registry->student;
        $course = $registry->course;

        $data = [
            'coursename' => $course->name,
            'names' => $student->names,
            'lastnames' => $student->lastnames,
            'phone' => $student->phone,
            'gender' => $student->gender,
            'email' => $student->email,
            'address' => $student->address,
            'grade' => $student->grade,
            'ci' => $student->full_ci,
            'age' => $student->age,
            'date' => now()->format('d/m/Y'),
        ];

        $fileName = "{$student->full_name} - Planilla de Inscripción";

        $filePath = Document::generateWord('enroll', $fileName, $data);

        return response()
            ->download($filePath)
            ->deleteFileAfterSend();
    }
}

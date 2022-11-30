<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Registry;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class EnrollmentController extends Controller
{
    public function create(Course $course)
    {
        return view('enrollment.create', [
            'course' => $course,
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

        return redirect()
            ->route('enrollment.success', $registry->id)
            ->with('enrolledType', $payment->type);
    }

    public function success(Registry $registry)
    {
        return view('enrollment.success', [
            'registry' => $registry,
            'enrolledType' => $registry->payment->type,
        ]);
    }

    public function download(Registry $registry)
    {
        $student = $registry->student;
        $course = $registry->course;

        $pdf = PDF::loadView('pdf.enroll', [
            'student' => $student,
            'course' => $course,
            'date' => now()->format('d/m/Y'),
        ]);

        $filename = "{$student->full_name} - Planilla de Inscripción.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }
}

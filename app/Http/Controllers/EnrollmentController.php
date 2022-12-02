<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Inscription;
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
        $inscription = user()->enroll($course);
        
        $data = $request->validate([
            'date' => ['required', 'date'],
            'ref' => ['nullable', 'integer', 'numeric'],
            'amount' => ['required', 'integer', 'numeric'],
            'type' => ['required', 'in:movil,transfer,dollars,bs'],
        ]);

        $data['inscription_id'] = $inscription->id;

        $payment = Payment::create($data);

        return redirect()
            ->route('enrollment.success', $inscription->id)
            ->with('enrolledType', $payment->type);
    }

    public function success(Inscription $inscription)
    {
        return view('enrollment.success', [
            'inscription' => $inscription,
            'enrolledType' => $inscription->payment->type,
        ]);
    }

    public function download(Inscription $inscription)
    {
        $student = $inscription->student;
        $course = $inscription->course;

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

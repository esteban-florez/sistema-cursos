<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentPDFController extends Controller
{
    public function index(Request $request)
    {
        $course = Course::with('instructor')
            ->findOrFail($request->input('course'));
 
        $enrollments = Enrollment::with('payment', 'student')
            ->latest()
            ->whereBelongsTo($course)
            ->get();
        
        $pdf = PDF::loadView('pdf.enrollments', [
            'enrollments' => $enrollments,
            'course' => $course,
            'date' => now()->format(DF),
            'logo' => base64('img/logo-upta.png'),
        ])->setPaper('a4', 'landscape');

        $filename = "{$course->name} - Matrícula.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }

    public function show(Enrollment $enrollment)
    {
        // TODO -> solución por ahora pa que los otros estudiantes no vean las planillas de uno
        if ($enrollment->user_id !== Auth::user()->id) {
            return redirect()->route('home');
        }

        $student = $enrollment->student;

        $pdf = PDF::loadView('pdf.enroll', [
            'student' => $student,
            'course' => $enrollment->course,
            'date' => now()->format(DF),
            'logo' => base64('img/logo-upta.png'),
        ]);

        $filename = "{$student->full_name} - Planilla de Inscripción.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Inscription;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index(Request $request)
    {
        $course = Course::findOrFail($request->input('course'));
        $search = $request->input('search');
        // Quizas ya no ponga dos controladores separados, no quedo tan fea la solución, o quizá si, no sé
        $inscriptions = Inscription::with('payment', 'student')
            ->whereBelongsTo($course)
            ->paginate(10)
            ->withQueryString();
        
        return view('inscribed.index', [
            'course' => $course,
            'inscriptions' => $inscriptions,
            'search' => $search,
        ]);
    }

    public function download(Request $request)
    {
        $course = Course::with('instructor')
            ->findOrFail($request->input('course'));
 
        $inscriptions = Inscription::with('payment', 'student')
            ->whereBelongsTo($course)
            ->get();
        
        $pdf = PDF::loadView('pdf.inscriptions', [
            'inscriptions' => $inscriptions,
            'course' => $course,
            'date' => now()->format('d/m/Y'),
            'logo' => base64('img/logo-upta.png'),
        ])->setPaper('a4', 'landscape');

        $filename = "{$course->name} - Matrícula.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }
}

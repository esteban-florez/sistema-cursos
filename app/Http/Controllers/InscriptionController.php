<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index(Request $request)
    {
        $course = Course::findOrFail($request->input('course'));
        // Quizas ya no ponga dos controladores separados, no quedo tan fea la solución, o quizá si, no sé
        $inscriptions = Inscription::with('payment', 'student')
            ->whereBelongsTo($course)
            ->paginate(10)
            ->withQueryString();
        
        return view('inscribed.index', [
            'course' => $course,
            'inscriptions' => $inscriptions,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Inscription;

class CourseStudentsController extends Controller
{
    public function index(Course $course)
    {
        // Solucion fea pa el estado, quizas sea mejor dos controladores separados
        if($course->status === 'Inscripciones') {
            $inscriptions = Inscription::with('payment')
                ->whereBelongsTo($course)
                ->get();
    
            // solucion medio fea para evitar n+1 query con pivot table
            $students = $course
                ->students()
                ->paginate(10);
            
            for($i = 0; $i < $inscriptions->count(); $i++) {
                $students[$i]->setRelation('inscription', $inscriptions[$i]);
            }
        } else {
            $inscriptions = Inscription::with('payment')
                ->whereNotNull('confirmed_at')
                ->whereBelongsTo($course)
                ->get();

            $ids = $inscriptions->map(function ($inscription) {
                return $inscription->id;
            });

            $students = $course
                ->students()
                ->whereIn('students.id', $ids)
                ->paginate(10);
            
            $cursor = 0;
            foreach($students as $student) {
                $student->setRelation('inscription', $inscriptions[$cursor]);
                $cursor++;
            }
        }

        return view('inscribed.index', [
            'course' => $course,
            'students' => $students,
        ]);
    }
}

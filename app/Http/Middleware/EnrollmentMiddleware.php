<?php

namespace App\Http\Middleware;

use App\Models\Enrollment;
use Closure;
use Illuminate\Http\Request;

class EnrollmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $course = $request->route('course');
        $student = user();
        // TODO -> hacer que redirija al available-courses.index con un mensaje de error según el caso
        if ($course->student_count >= $course->student_limit) {
            return redirect()->route('available-courses.index');
        }

        if ($course->phase !== 'Inscripciones') {
            return redirect()->route('available-courses.index');
        }

        $enrollment = Enrollment::where('course_id', $course->id)
            ->where('student_id', $student->id)
            ->first();
        
        if ($enrollment !== null) {
            return redirect()->route('available-courses.index');
        }
        
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Registry;
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

        $registry = Registry::where('course_id', $course->id)
            ->where('student_id', $student->id)
            ->first();

        if ($registry !== null) {
            return redirect()->route('market.index');
        }
        
        return $next($request);
    }
}

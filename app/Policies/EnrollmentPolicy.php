<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnrollmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, Course $course = null)
    {
        if ($user->can('role', 'Administrador')) return true;

        $course = $course ?? Course::findOrFail(request()->query('course'));

        return $user->can('role', 'Instructor') && $course->instructor->id === $user->id;
    }

    public function create(User $user, Course $course = null)
    {
        $course = $course ?? Course::findOrFail(request()->query('course'));

        return $user->can('role', 'Estudiante')
            && $course->students_count < $course->student_limit
            && $course->phase === 'Inscripciones'
            && $user->enrolledCourses->doesntContain($course);
    }
}

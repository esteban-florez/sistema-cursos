<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('role', ['Administrador', 'Instructor']);
    }
    
    public function view()
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->can('role', 'Administrador');
    }

    public function update(User $user, Course $course)
    {
        return $user->can('role', ['Administrador', 'Instructor'])
            && $course->phase !== 'Finalizado';
    }
}

<?php

namespace App\Gates;

use App\Models\Enrollment;
use App\Models\User;

class PDFGates extends Gates
{
    protected static $prefix = 'pdf';

    public function enrollment()
    {

    }

    public function enrollments()
    {

    }

    public function payments()
    {

    }

    public function items()
    {

    }

    public function certificate(User $user, Enrollment $enrollment)
    {
        return $user->can('role', 'Estudiante') 
            && $enrollment->student->id === $user->id;
    }

    public function memberships()
    {

    }
}

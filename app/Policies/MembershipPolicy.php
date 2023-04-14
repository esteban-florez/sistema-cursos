<?php

namespace App\Policies;

use App\Models\Club;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MembershipPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, Club $club = null)
    {
        if ($user->can('role', 'Administrador')) return true;

        $club = $club ?? Club::findOrFail(request()->query('club'));

        return $user->can('role', 'Instructor') && $club->instructor->id === $user->id;
    }

    public function create(User $user, Club $club = null)
    {
        $club = $club ?? Club::findOrFail(request()->query('club'));

        return $user->can('role', 'Estudiante') 
            && $user->joinedClubs->doesntContain($club);
    }

    public function delete(User $user, Membership $membership)
    {
        if ($user->can('role', ['Administrador', 'Instructor'])) return true;

        return $user->can('role', 'Estudiante') 
            && $membership->student->id === $user->id;
    }
}

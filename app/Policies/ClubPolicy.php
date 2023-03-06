<?php

namespace App\Policies;

use App\Models\Club;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClubPolicy
{
    use HandlesAuthorization, AllowsAdmin;

    public function viewAny(User $user)
    {
        return $user->can('role', 'Instructor');
    }

    public function create()
    {
        return false;
    }

    public function view()
    {
        return true;
    }

    public function update(User $user, Club $club)
    {
        return $club->instructor->id === $user->id;
    }
}

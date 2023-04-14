<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoanPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('role', 'Administrador');
    }

    public function create(User $user)
    {
        return $user->can('role', 'Administrador');
    }

    public function update(User $user, Loan $loan)
    {
        return $user->can('role', 'Administrador')
            && $loan->status === 'Prestado';
    }
}

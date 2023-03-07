<?php

namespace App\Policies;

use App\Models\Loan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoanPolicy
{
    use HandlesAuthorization, AllowsAdmin;

    public function update(Loan $loan)
    {
        return $loan->status === 'Prestado';
    }
}

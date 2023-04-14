<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('role', 'Administrador');
    }

    public function update(User $user, Payment $payment)
    {
        return $user->can('role', 'Estudiante')
            && $payment->enrollment->student->id === $user->id
            && $payment->status !== 'Confirmado';
    }
}

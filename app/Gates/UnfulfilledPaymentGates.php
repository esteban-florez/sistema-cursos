<?php

namespace App\Gates;

use App\Models\Payment;
use App\Models\User;

class UnfulfilledPaymentGates extends Gates
{
    protected static $prefix = 'unfulfilled-payments';

    public function viewAny(User $user, User $model)
    {
        $user->can('role', 'Estudiante')
            && $model->id === $user->id; 
    }

    public function update(User $user, Payment $payment)
    {
        $user->can('role', 'Estudiante')
            && $payment->enrollment->student->id === $user->id;
    }
}
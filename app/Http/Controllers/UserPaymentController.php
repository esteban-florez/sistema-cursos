<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;

class UserPaymentController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('users.payments.viewAny', $user);

        $payments = Payment::with('enrollment.course')
            ->whereHas('enrollment', function ($query) use ($user) {
                $query->where('enrollments.user_id', $user->id);
            })->latest()
            ->paginate(6);

        return view('users-payments.index', [
            'payments' => $payments,
            'user' => $user,
        ]);
    }
}

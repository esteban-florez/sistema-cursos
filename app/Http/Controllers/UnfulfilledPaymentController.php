<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UnfulfilledPaymentController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail($request->query('user'));

        $payments = $user->payments()
            ->unfulfilled()
            ->latest()
            ->paginate(6);
        
        return view('unfulfilled-payments.index', [
            'user' => $user,
            'payments' => $payments,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class PendingPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('inscription.student', 'inscription.course')
            ->where('status', 'Pendiente')
            ->paginate(9)
            ->withQueryString();

        return view('payments.pending', [
            'payments' => $payments,
        ]);
    }
}

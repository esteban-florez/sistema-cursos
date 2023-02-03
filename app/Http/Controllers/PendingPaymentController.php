<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class PendingPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('enrollment.student', 'enrollment.course')
            ->where('status', 'Pendiente')
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('pending-payments.index', [
            'payments' => $payments,
        ]);
    }
}

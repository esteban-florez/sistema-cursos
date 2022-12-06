<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PendingPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('status', 'pending')
            ->paginate(10);

        return view('payments.pending', [
            'payments' => $payments,
        ]);
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:confirmed,rejected'],
        ]);

        $payment->update($data);
        
        return redirect()->route('payments.pending');
    }
}

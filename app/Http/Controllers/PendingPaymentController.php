<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PendingPaymentController extends Controller
{
    public function index()
    {
        // TODO -> n + 1 queries here
        $payments = Payment::with('inscription')
            ->where('status', 'pending')
            ->paginate(9)
            ->withQueryString();

        return view('payments.pending', [
            'payments' => $payments,
        ]);
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:confirmed,rejected'],
        ]);
        logger('lel');
        $operation = $request->input('status') === 'confirmed' ? 'confirmado' : 'rechazado';
        $payment->update($data);
        
        return redirect()
            ->back()
            ->withSuccess("El pago se ha {$operation} de forma exitosa.");
    }
}

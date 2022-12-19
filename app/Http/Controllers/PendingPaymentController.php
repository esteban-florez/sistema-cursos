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
            ->where('status', 'Pendiente')
            ->paginate(9)
            ->withQueryString();

        return view('payments.pending', [
            'payments' => $payments,
        ]);
    }

    // TODO -> pasar este método a un PaymentStatusController
    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:Confirmado,Rechazado,Pendiente'],
        ]);
        
        $payment->update($data);
        
        $operation = lcfirst($request->input('status'));

        return redirect()
            ->back()
            ->withSuccess("El pago se ha {$operation} de forma exitosa.");
    }
}

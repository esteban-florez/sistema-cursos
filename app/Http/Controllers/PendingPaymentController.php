<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePendingPaymentRequest;
use App\Models\Payment;

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
    public function update(UpdatePendingPaymentRequest $request, Payment $payment)
    {
        $data = $request->validated();
        
        $payment->update($data);
        
        $operation = lcfirst($request->input('status'));

        return redirect()
            ->back()
            ->withSuccess("El pago se ha {$operation} de forma exitosa.");
    }
}

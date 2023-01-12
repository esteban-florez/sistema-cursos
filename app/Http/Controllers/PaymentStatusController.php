<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:'.payStatuses()->join(',')],
        ]);
        
        $payment->update($data);
        
        return redirect()
            ->back()
            ->withSuccess("El estado del pago se ha actualizado de forma exitosa.");
    }
}

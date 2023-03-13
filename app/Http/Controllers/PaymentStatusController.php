<?php

namespace App\Http\Controllers;

use App\Events\PaymentEvent;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:'.payStatuses()->join(',')],
        ]);
        
        $payment->update($data);

        event(new PaymentEvent($payment, 'updated-status'));
        
        // return backWithoutQuery()
        return back()
            ->with('alert', trans('alerts.payment-status.updated'));
    }
}

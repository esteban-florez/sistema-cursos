<?php

namespace App\Http\Controllers;

use App\Events\PaymentEvent;
use App\Models\MovilCredentials;
use App\Models\Payment;
use App\Models\TransferCredentials;
use App\Models\User;
use Illuminate\Http\Request;

class UnfulfilledPaymentController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail($request->query('user'));
        
        $this->authorize('unfulfilled-payments.viewAny', $user);

        $payments = $user->payments()
            ->unfulfilled()
            ->latest()
            ->paginate(6);
        
        return view('unfulfilled-payments.index', [
            'user' => $user,
            'payments' => $payments,
        ]);
    }

    public function edit($id)
    {
        $payment = Payment::unfulfilled()
            ->findOrFail($id);
        
        $this->authorize('unfulfilled-payments.update', $payment);
        
        $credentials = new \stdClass;
        
        $credentials->movil = MovilCredentials::select(
            ['ci', 'bank', 'phone'])->firstOrFail();
        
        $credentials->transfer = TransferCredentials::select(
            ['name', 'ci', 'bank', 'account', 'type'])->firstOrFail();

        return view('unfulfilled-payments.edit', [
            'payment' => $payment,
            'user' => $payment->enrollment->student,
            'course' => $payment->enrollment->course,
            'credentials' => $credentials,
        ]);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::unfulfilled()
            ->findOrFail($id);

        $this->authorize('unfulfilled-payments.update', $payment);

        $data = $request->validate([
            'ref' => [
                'required_if:type,'.payTypes()->take(2)->join(','),
                'numeric', 'integer', 'digits_between:4,10',
            ],    
            'type' => ['required', 'in:'.payTypes()->join(',')],
            'amount' => ['required', 'integer', 'numeric'],
        ]);    

        $data['fulfilled'] = true;

        $payment->update($data);

        event(new PaymentEvent($payment, 'created'));

        return redirect()
            ->route(
                'unfulfilled-payments.index', [
                    'user' => $payment->enrollment->student,
                ])
            ->with('alerts', trans('alerts.fulfilled'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\FulfillPaymentRequest;
use App\Models\MovilCredentials;
use App\Models\Payment;
use App\Models\TransferCredentials;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit($id)
    {
        $payment = Payment::unfulfilled()
            ->findOrFail($id);
        
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
        $data = $request->validate([
            'type' => ['required', 'in:'.payTypes()->join(',')],
            'ref' => [
                'required_if:type,'.payTypes()->take(2)->join(','),
                'numeric',
                'digits_between:4,10',
            ],
            'amount' => ['required', 'numeric'],
        ]);

        $data['fulfilled'] = true;

        $payment = Payment::unfulfilled()
            ->findOrFail($id);

        $payment->update($data);

        return redirect()
            ->route(
                'unfulfilled-payments.index', [
                    'user' => $payment->enrollment->student->id
                ])
            ->with('alerts', trans('alerts.fulfilled'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\Course;
use App\Services\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $sort = $request->input('sort');
        $search = $request->input('search');
        
        $payments = Payment::with('enrollment.student', 'enrollment.course')
            ->latest()
            ->filters($filters)
            ->search($search)
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();

        return view('payments.index', [
            'payments' => $payments,
            'filters' => $filters,
            'sort' => $sort,
            'search' => $search,
            'courses' => Course::getOptions(),
        ]);
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', [
            'payment' => $payment,
        ]);
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $data = $request->validated();

        $payment->update([
            ...$data,
            'status' => 'Pendiente',
        ]);

        return redirect()
            ->route('users.payments.index', Auth::user()->id)
            ->with('alert', trans('alerts.payments.updated'));
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->with('alert', trans('alerts.payments.deleted'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Course;
use App\Services\Input;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $sort = $request->input('sort', '');
        $search = $request->input('search', '');
        
        $payments = Payment::filters($filters)
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
            'types' => Payment::$types,
            'statuses' => Payment::$statuses,
        ]);
    }
    
    public function pending()
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

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index');
    }
}

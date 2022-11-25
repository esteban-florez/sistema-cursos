<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Services\Input;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function index()
    {
        $filters = Input::getFilters();
        
        $payments = Payment::filters($filters, false, false)
            ->paginate(10)
            ->withQueryString();
        
        return view('payments.index', [
            'payments' => $payments,
            'filters' => $filters,
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

    public function show()
    {
        return 'in progress :3';
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:confirmed,rejected'],
        ]);

        $payment->update($data);
        
        return redirect()->route('payments.index');
    }
}

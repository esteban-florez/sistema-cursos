<?php

namespace App\Http\Controllers;

use App\Events\LoanEvent;
use App\Http\Requests\StoreLoanRequest;
use App\Models\Club;
use App\Models\Loan;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Loan::class);
    }

    public function index()
    {
        $clubs = Club::getOptions();
        $loans = Loan::latest()
            ->paginate(10)
            ->withQueryString();
        
        return view('loans', [
            'loans' => $loans,
            'clubs' => $clubs,
        ]);
    }

    public function store(StoreLoanRequest $request)
    {
        $data = $request->validated();        
        
        $loan = Loan::create($data);

        event(new LoanEvent($loan, 'created'));

        return back()
            ->with('alert', trans('alerts.loans'));
    }

    public function update(Loan $loan)
    {
        $loan->update([
            'returned_at' => now(),
        ]);

        event(new LoanEvent($loan, 'updated'));
        
        return redirect()
            ->route('loans.index');
    }
}

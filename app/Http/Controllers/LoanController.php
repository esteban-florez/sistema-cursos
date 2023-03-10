<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Club;
use App\Models\Item;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Loan::class);
    }

    public function index()
    {
        $items = Item::getOptions();
        $clubs = Club::getOptions();
        $loans = Loan::latest()
            ->paginate(10)
            ->withQueryString();
        
        return view('loans', [
            'loans' => $loans,
            'items' => $items,
            'clubs' => $clubs,
        ]);
    }

    public function store(StoreLoanRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();        
        
        $loan = Loan::create($data);

        Loan::LoanNotification($loan);

        return back()
            ->with('alert', trans('alerts.loans'));
    }

    public function update(Loan $loan)
    {
        $loan->update([
            'returned_at' => now(),
        ]);

        return redirect()
            ->route('loans.index');
    }
}

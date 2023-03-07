<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Item;
use App\Models\Loan;
use App\Rules\ValidID;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Loan::class);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $items = Item::getOptions();
        $clubs = Club::getOptions();
        $loans = Loan::latest()
            ->paginate(10)
            ->withQueryString();
        
        return view('loans', [
            'search' => $search,
            'loans' => $loans,
            'items' => $items,
            'clubs' => $clubs,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => ['required', 'integer', 'numeric'],
            'item_id' => ['required', 'integer', 'numeric', new ValidID],
            'club_id' => ['required', 'integer', 'numeric', new ValidID],
        ]);        
        
        Loan::create($data);

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

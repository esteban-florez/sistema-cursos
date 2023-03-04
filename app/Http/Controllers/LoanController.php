<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => ['required', 'integer', 'numeric'],
            'item_id' => ['required', 'integer', 'numeric'],
            'club_id' => ['required', 'integer', 'numeric'],
        ]);        
        
        Loan::create($data);

        return back()
            ->with('alert', trans('alerts.loans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Loan $loan)
    {
        $loan->update([
            'returned_at' => now(),
        ]);

        return redirect()
            ->route('loans.index');
    }
}

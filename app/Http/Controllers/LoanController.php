<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Club;
use App\Models\Item;
use App\Models\Loan;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanRequest $request)
    {
        $data = $request->validated();        
        
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

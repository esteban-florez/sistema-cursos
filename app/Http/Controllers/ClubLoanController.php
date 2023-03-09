<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Loan;
use Illuminate\Http\Request;

class ClubLoanController extends Controller
{
    public function index(Request $request)
    {
        $club = Club::findOrFail($request->query('club'));

        $loans = Loan::whereBelongsTo($club)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('club-loans.index', [
            'club' => $club,
            'loans' => $loans,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Loan;

class ClubLoanController extends Controller
{
    public function index(Club $club)
    {
        $this->authorize('clubs.loans.viewAny', $club);

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

<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Membership;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class MembershipPDFController extends Controller
{
    public function index(Request $request)
    {
        $club = Club::with('instructor')
            ->findOrFail($request->query('club'));
 
        $memberships = Membership::latest()
            ->whereBelongsTo($club)
            ->get();
        
        $pdf = PDF::loadView('pdf.memberships', [
            'memberships' => $memberships,
            'club' => $club,
            'date' => now()->format(DF),
            'logo' => base64('img/logo-upta.png'),
        ])->setPaper('a4', 'landscape');

        $filename = "{$club->name} - Miembros.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }
}

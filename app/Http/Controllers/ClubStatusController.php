<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

    public function update(Request $request, Club $club)
    {
        $data = $request->validate([
            'status' => ['required', 'in:'.clubStatuses()->join(',')],
        ]);
        
        $club->update($data);

        return back()
            ->with('alert', trans('alerts.club-status.updated'));
    }
}

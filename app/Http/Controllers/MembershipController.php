<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Membership::class);
    }

    public function index(Request $request)
    {
        $club = Club::findOrFail($request->query('club'));

        $memberships = Membership::whereBelongsTo($club)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('memberships.index', [
            'club' => $club,
            'memberships' => $memberships,
        ]);
    }

    public function store(Request $request)
    {
        Membership::create([
            'club_id' => Club::findOrFail($request->query('club'))->id,
            'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->route('available-clubs.index')
            ->with('alert', trans('alerts.joined'));
    }

    public function destroy(Membership $membership)
    {
        $user = Auth::user();
        $club = $membership->club;
        $membership->delete();

        return $user->can('viewAny', [Membership::class, $club])
            ? redirect()->route('memberships.index', ['club' => $club])
                    ->with('alert', trans('alerts.users.retired')) 
  
            : redirect()->route('users.memberships.index', $user)
                    ->with('alert', trans('alerts.retired'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    // POLICY
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Membership::create([
            'club_id' => Club::findOrFail($request->query('club'))->id,
            'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->route('available-clubs.index')
            ->with('alert', trans('alerts.joined'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        $club = $membership->club;

        return view('users-memberships.show', [
            'membership' => $membership,
            'club' => $club,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        $user = Auth::user();
        $club = $membership->club;
        $membership->delete();

        if ($user->role === 'Estudiante') {
            return redirect()->route('users.memberships.index', $user)
                ->with('alert', trans('alerts.retired'));
        }
        else {
            return redirect()->route('memberships.index', ['club' => $club])
                ->with('alert', trans('alerts.users.retired'));
        }
    }
}

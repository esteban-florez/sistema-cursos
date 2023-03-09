<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class UserMembershipController extends Controller
{
    public function index(Request $request, User $user)
    {
        $this->authorize('users.memberships.viewAny', $user);

        $search = $request->input('search');

        $memberships = $user
            ->memberships()
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('users-memberships.index', [
            'memberships' => $memberships,
            'search' => $search,
            'user' => $user,
        ]);
    }

    public function show(Membership $membership)
    {
        $this->authorize('users.memberships.view', $membership);

        return view('users-memberships.show', [
            'membership' => $membership,
            'club' => $membership->club,
        ]);
    }
}

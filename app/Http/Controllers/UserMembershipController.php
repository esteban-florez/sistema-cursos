<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserMembershipController extends Controller
{
    public function index(Request $request, User $user)
    {
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
}

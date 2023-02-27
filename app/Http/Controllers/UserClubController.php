<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserClubController extends Controller
{
    public function index(Request $request, User $user)
    {
        $search = $request->input('search');
        $clubs = $user->dictatedClubs()
            ->latest()
            ->get();

        return view('users-clubs.index', [
            'user' => $user,
            'clubs' => $clubs,
            'search' => $search,
        ]);
    }
}

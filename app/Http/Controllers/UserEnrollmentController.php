<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserEnrollmentController extends Controller
{
    public function index(Request $request, User $user)
    {
        $search = $request->input('search');

        $enrollments = $user
            ->enrollments()
            ->latest()
            ->with('course')
            ->whereHas('course', 
                fn($q) => $q->where('courses.name', 'like', "%{$search}%"))
            ->paginate(6)
            ->withQueryString();

        return view('users-enrollments.index', [
            'enrollments' => $enrollments,
            'search' => $search,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    // GATE
    public function index(Request $request, User $user)
    {
        $search = $request->input('search');
        $courses = $user->dictatedCourses()
            ->latest()
            ->get();

        return view('users-courses.index', [
            'user' => $user,
            'courses' => $courses,
            'search' => $search,
        ]);
    }
}

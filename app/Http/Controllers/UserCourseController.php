<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index(Request $request, User $user)
    {
        $this->authorize('users.courses.viewAny', $user);

        $search = $request->query('search');
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

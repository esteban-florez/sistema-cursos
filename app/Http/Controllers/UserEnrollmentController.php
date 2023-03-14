<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class UserEnrollmentController extends Controller
{
    public function index(Request $request, User $user)
    {
        $this->authorize('users.enrollments.viewAny', $user);

        $search = $request->query('search');

        $enrollments = $user
            ->enrollments()
            ->latest()
            ->with('course')
            ->whereHas('course', function ($q) use ($search) {
                return $q->where('courses.name', 'like', "%{$search}%");
            })->paginate(6)
            ->withQueryString();

        return view('users-enrollments.index', [
            'enrollments' => $enrollments,
            'search' => $search,
            'user' => $user,
        ]);
    }

    public function show(Enrollment $enrollment)
    {
        $this->authorize('users.enrollments.view', $enrollment);

        return view('users-enrollments.show', [
            'user' => $enrollment->user,
            'enrollment' => $enrollment,
            'payments' => $enrollment->payments,
            'course' => $enrollment->course,
        ]);
    }
}

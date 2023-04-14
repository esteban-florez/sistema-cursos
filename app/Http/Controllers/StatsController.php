<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Club;
use App\Models\Enrollment;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\User;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

    public function __invoke()
    {
        $allCourses = Course::all(); 
        $allClubs = Club::all();

        $students = User::instructors()->count();
        $incomes = Payment::incomes();
        $instructors = User::students()->count();

        $courses = $allCourses->count();
        $enrollments = Enrollment::all()->count();

        $course = $allCourses
            ->sortByDesc('students_count')
            ->first();

        $clubs = $allClubs->count();
        $memberships = Membership::all()->count();
        
        $club = $allClubs
            ->sortByDesc('members_count')
            ->first();

        return view('stats', [
            'students' => "{$students} estudiantes",
            'incomes' => "{$incomes} Bs.D.",
            'instructors' => "{$instructors} instructores",
            'courses' => "{$courses} cursos",
            'enrollments' => "{$enrollments} estudiantes",
            'course' => $course,
            'clubs' => "{$clubs} clubes",
            'memberships' => "{$memberships} miembros",
            'club' => $club,
        ]);
    }
}

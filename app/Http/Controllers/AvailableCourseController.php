<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class AvailableCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Estudiante');
    }
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $sortColumn = $request->query('sort');
        $search = $request->query('search');

        $courses = Course::availables()
            ->notBoughtBy($user)
            ->search($search)
            ->sort($sortColumn)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('available-courses.index', [
            'courses' => $courses,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }
}

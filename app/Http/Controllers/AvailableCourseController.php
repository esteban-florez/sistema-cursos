<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class AvailableCourseController extends Controller
{
    public function index(Request $request)
    {
        $student = Auth::user();
        $sortColumn = $request->input('sort');
        $search = $request->input('search');

        $courses = Course::availables()
            ->notBoughtBy($student)
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

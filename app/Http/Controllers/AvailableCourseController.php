<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class AvailableCourseController extends Controller
{
    public function __invoke(Request $request)
    {
        $student = user();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class AvailableCourseController extends Controller
{
    public function index(Request $request)
    {
        $student = user();
        $sortColumn = $request->input('sort');
        $search = $request->input('search');

        $courses = Course::availables()
            ->notBoughtBy($student)
            ->onInscriptions()
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

    public function show(Course $course)
    {
        return view('available-courses.show', [
            'course' => $course,
        ]);
    }
}

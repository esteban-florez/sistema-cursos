<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class MarketController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::paginate(10);

        return view('market.index', [
            'courses' => $courses,
        ]);
    }

    public function show(Course $course)
    {
        return view('market.show', [
            'course' => $course,
        ]);
    }
}

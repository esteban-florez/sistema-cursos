<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class MarketController extends Controller
{
    public function index(Request $request)
    {
        $student = user();
        $sortColumn = $request->input('sort', '');
        $search = $request->input('search', '');

        $courses = Course::availables($student)
            ->notBoughtBy($student)
            ->onInscriptions()
            ->filters(false, $sortColumn, $search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('market.index', [
            'courses' => $courses,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }

    public function show(Course $course)
    {
        return view('market.show', [
            'course' => $course,
        ]);
    }
}

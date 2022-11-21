<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Services\Input;

class MarketController extends Controller
{
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $sortColumn = $request->input('sort', '');
        $search = $request->input('search', '');

        $courses = Course::filters($filters, $sortColumn, $search)
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

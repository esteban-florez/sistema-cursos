<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Services\Input;
use Illuminate\Http\Request;

class AvailableClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $search = $request->input('search');
        $sortColumn = $request->input('sort');

        $clubs = Club::latest()
            ->filters($filters)
            ->search($search)
            ->sort($sortColumn)
            ->paginate(10)
            ->withQueryString();
        
        return view('users-clubs.index', [
            'clubs' => $clubs,
            'filters' => $filters,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }
}

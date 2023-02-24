<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Services\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailableClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $filters = Input::getFilters();
        $search = $request->input('search');
        $sortColumn = $request->input('sort');

        $clubs = Club::notJoinedBy($user)
            ->search($search)
            ->sort($sortColumn)
            ->filters($filters)
            ->paginate(10)
            ->withQueryString();
        
        return view('available-clubs.index', [
            'clubs' => $clubs,
            'filters' => $filters,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }
}

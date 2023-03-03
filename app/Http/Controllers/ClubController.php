<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\User;
use App\Services\Input;

class ClubController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Club::class);
    }

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
        
        return view('clubs.index', [
            'clubs' => $clubs,
            'filters' => $filters,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('clubs.create', [
            'instructors' => User::getOptions('Instructor'),
        ]);
    }

    public function store(StoreClubRequest $request) 
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/clubs');
        }

        Club::create($data);

        return redirect()->route('clubs.index')
            ->with('alert', trans('alerts.clubs.created'));
    }

    public function show(Club $club)
    {
        return view('clubs.show', [
            'club' => $club,
            ]
        );
    }

    public function edit(Club $club)
    {
        return view ('clubs.edit', [
            'club' => $club,
            'instructors' => User::getOptions('Instructor'),
        ]);
    }

    public function update(UpdateClubRequest $request, Club $club)
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/clubs');
        }

        $club->update($data);

        return redirect()->route('clubs.index')
            ->with('alert', trans('alerts.clubs.updated'));
    }
}

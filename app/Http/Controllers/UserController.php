<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Area;
use App\Models\User;
use App\Models\PNF;
use App\Services\Input;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->authorizeResource(User::class);
    }

    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $search = $request->query('search');
        $sortColumn = $request->query('sort');
        
        $users = User::latest()
            ->excludeAdmin()
            ->filters($filters)
            ->search($search)
            ->sort($sortColumn)
            ->paginate(10)
            ->withQueryString();

        return view('users.index', [
            'users' => $users,
            'filters' => $filters,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }
    
    public function create(Request $request)
    {
        return view('users.create', [
            'areas' => Area::getOptions(),
            'pnfs' => PNF::getOptions(),
            'defaultRole' => $request->query('role'),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/profiles');
        }

        User::create($data);

        return redirect()->route('users.index')
            ->with('alert', trans('alerts.users.created'));
    }

    public function show(User $user)
    {
        $courses = $user->dictatedCourses()
            ->latest()
            ->get();
            
        $clubs = $user->dictatedClubs()
            ->latest()
            ->get();

        $enrollments = $user
            ->enrollments()
            ->latest()
            ->paginate(2)
            ->withQueryString();

        $memberships = $user
            ->memberships()
            ->latest()
            ->paginate(2)
            ->withQueryString();

        return view('users.show',[
            'user' => $user,
            'enrollments' => $enrollments,
            'memberships' => $memberships,
            'courses' => $courses,
            'clubs' => $clubs,
        ]);
    }

    public function edit(User $user)
    {
        $areas = Area::getOptions();
        $pnfs = PNF::getOptions();

        return view('users.edit', [
            'user' => $user,
            'areas' => $areas,
            'pnfs' => $pnfs,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('users.show', $user)
            ->with('alert', trans('alerts.profile.updated'));
    }
}

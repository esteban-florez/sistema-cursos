<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $adminFilter = $request->input('admin', '');
        $sortColumn = $request->input('sort', '');

        $instructors = Instructor::filters($adminFilter, $sortColumn, $search)
            ->paginate(10)
            ->withQueryString();

        return view('instructors.index', [
            'instructors' => $instructors,
            'filter' => $adminFilter,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all(['id', 'name']);
        $areas = $areas->mapWithKeys(function ($area) {
            return [$area->id => $area->name];
        })->sortKeys();

        return view('instructors.create', [
            'areas' => $areas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'alpha', 'max:20'],
            'lastname' => ['required', 'alpha', 'max:20'],
            'ci' => ['required', 'integer', 'numeric', 'unique:instructors,ci'],
            'ci_type' => ['required', 'in:V,E'],
            'image' => ['nullable', 'image'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'digits:11'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:instructors,email'],
            'password' => [
                'required', 'max:255', 'confirmed', 
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'degree' => ['required', 'max:255'], 
            'area_id' => ['required', 'integer', 'numeric'],
            'birth' => ['required', 'date'],
        ]);

        Instructor::create($data);

        return redirect()->route('instructors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        return view('instructors.show',[
            'instructor' => $instructor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        $areas = Area::all(['id', 'name']);
        $areas = $areas->mapWithKeys(function ($area) {
            return [$area->id => $area->name];
        })->sortKeys();

        return view('instructors.edit', [
            'instructor' => $instructor,
            'areas' => $areas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}

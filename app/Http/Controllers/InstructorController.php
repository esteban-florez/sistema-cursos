<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        //
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

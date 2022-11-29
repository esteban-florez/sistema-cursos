<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Instructor;
use App\Services\Input;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $search = $request->input('search', '');
        $sortColumn = $request->input('sort', '');

        $clubs = Club::filters($filters, $sortColumn, $search)
            ->paginate(10)
            ->withQueryString();
        
        return view('club.index', [
            'clubs' => $clubs,
            'filters' => $filters,
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
        $instructors = Instructor::getOptions();
        
        return view('club.create', [
            'instructors' => $instructors,
        ]);
    }
    //return view ('club.create');

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) 
    {
        // $data = $request->except("_token");

        $data = $request->validate([
            'name' => ['required', 'max:30'],
            'image' => ['required', 'file', 'image', 'max:2048'],
            'description' => ['required', 'max:255'],
            'day' => ['required', 'in:mo,tu,we,th,fr,sa,su'],
            'start_hour' => ['required'],
            'end_hour' => ['required'],
            'instructor_id' => ['required', 'integer', 'numeric'],
        ]);

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/clubs');
        } else {
            unset($data['image']);
        }

        Club::create($data);

        return redirect()->route('club.index')
            ->withSuccess('El club se ha añadido con éxito');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        $instructors = Instructor::getOptions();

        return view ('club.edit', [
            'club' => $club,
            'instructors' => $instructors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $data = $request->validate([
            'name' => ['required', 'max:30'],
            'image' => ['required', 'file', 'image', 'max:2048'],
            'description' => ['required', 'max:255'],
            'day' => ['required', 'in:mo,tu,we,th,fr,sa,su'],
            'start_hour' => ['required'],
            'end_hour' => ['required'],
            'instructor_id' => ['required', 'integer', 'numeric'],
        ]);

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/clubs');
        } else {
            unset($data['image']);
        }

        $club->update($data);

        return redirect()->route('club.index')
            ->withWarning('El club se ha editado con éxito');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $club->delete();

        return redirect()->route('club.index')
            ->withDanger('El club se ha eliminado con éxito');
    }
}

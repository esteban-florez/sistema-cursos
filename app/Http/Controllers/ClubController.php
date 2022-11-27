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
    public function index()
    {
        $clubs = Club::all();
        return view('club.index')->with('clubs', $clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = Instructor::all();
        
        return view('club.create',
            ['instructors -> $instructors']);
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
        ]);

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/clubs');
        } else {
            unset($data['image']);
        }

        // if ($image = $data['image']){
        //     $routeSaveImg = 'img/';
        //     $imgClub = date('YmdHis'). '.' . $image->getClientOriginalExtension();
        //     $image->move($routeSaveImg, $imgClub);
        //     $data['image'] = "$imgClub";
        // }

        Club::create($data);

        return redirect()->route('club.index');
    }

    /** $club->id = $request->get('id');
        *$club->name = $request->get('name');
        *$club->description = $request->get('description');
        *$club->image = $request->get('image');
        *$club->day = $request->get('day');
        *$club->start_hour = $request->get('start_hour');
        *$club->end_hour = $request->get('end_hour');
        *$club->instructor_id = $request->get('instructor_id');

        *$club->save();

        *return redirect('/club');
    */ 


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
    public function edit($id)
    {
        $club = Club::find($id);
        return view ('club.edit')->with('club',$club);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $club = Club::find($id);

        $club->id = $request->get('id');
        $club->name = $request->get('name');
        $club->description = $request->get('description');
        $club->image = $request->get('image');
        $club->day = $request->get('day');
        $club->start_hour = $request->get('start_hour');
        $club->end_hour = $request->get('end_hour');
        $club->instructor_id = $request->get('git');

        $club->save();

        return redirect('/club');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return redirect('/club');
    }
}

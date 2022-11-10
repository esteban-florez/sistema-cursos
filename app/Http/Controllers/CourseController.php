<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = Instructor::all();
        $areas = Area::all();

        return view('courses.register-course', 
            ['instructors' => $instructors, 'areas' => $areas]
        );
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
            'name' => ['required', 'max:30'],
            'image' => ['nullable'],
            'instructor_id' => ['required'],
            'area_id' => ['required'],
            'description' => ['required', 'max:255'],
            'total_price' => ['required'],
            'price_ins' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'start_course' => ['required'],
            'end_course' => ['required'],
            'duration' => ['required'],
            'student_limit' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        Course::create($data);

        return redirect()->route('courses.index');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

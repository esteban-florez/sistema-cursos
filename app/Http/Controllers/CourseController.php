<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;
use App\Services\RequestFile;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = Instructor::getOptions();
        $areas = Area::getOptions();

        return view('courses.create', [
            'instructors' => $instructors, 
            'areas' => $areas
            ]
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
        // dd($request->all());

        $data = $request->validate([
            'name' => ['required', 'max:30'],
            'image' => ['image', 'max:1024'],
            'instructor_id' => ['required'],
            'area_id' => ['required'],
            'description' => ['required', 'max:255'],
            'total_price' => ['required'],
            'price_ins' => ['required'],
            'start_ins' => ['required'],
            'end_ins' => ['required'],
            'start_course' => ['required'],
            'end_course' => ['required'],
            'duration' => ['required'],
            'student_limit' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        if (RequestFile::check('image')) {
            $data['image'] = RequestFile::store('image', 'public/courses');
        } else {
            unset($data['image']);
        }

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

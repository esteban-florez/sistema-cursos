<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
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
            'image' => ['required', 'file', 'image', 'max:2048'],
            'instructor_id' => ['required', 'integer', 'numeric'],
            'area_id' => ['required', 'integer', 'numeric'],
            'description' => ['required', 'max:255'],
            'total_price' => ['required', 'integer', 'numeric'],
            'price_ins' => ['required', 'integer', 'numeric'],
            'start_ins' => ['required', 'date'],
            'end_ins' => ['required', 'date'],
            'start_course' => ['required', 'date'],
            'end_course' => ['required', 'date'],
            'duration' => ['required', 'integer', 'numeric'],
            'student_limit' => ['required', 'integer', 'numeric'],
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
    public function show(Course $courses)
    {
        return view('courses.show', [
            'courses' => $courses,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $courses)
    {
        $instructors = Instructor::getOptions();
        $areas = Area::getOptions();

        return view('courses.edit', [
            'courses' => $courses,
            'instructors' => $instructors, 
            'areas' => $areas
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $courses)
    {
        $data = $request->validate([
            'name' => ['required', 'max:30'],
            'image' => ['required', 'file', 'image', 'max:2048'],
            'instructor_id' => ['required', 'integer', 'numeric'],
            'area_id' => ['required', 'integer', 'numeric'],
            'description' => ['required', 'max:255'],
            'total_price' => ['required', 'integer', 'numeric'],
            'price_ins' => ['required', 'integer', 'numeric'],
            'start_ins' => ['required', 'date'],
            'end_ins' => ['required', 'date'],
            'start_course' => ['required', 'date'],
            'end_course' => ['required', 'date'],
            'duration' => ['required', 'integer', 'numeric'],
            'student_limit' => ['required', 'integer', 'numeric'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        if (RequestFile::check('image')) {
            $data['image'] = RequestFile::store('image', 'public/courses');
        } else {
            unset($data['image']);
        }

        $courses->update($data);

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $courses)
    {
        //
    }
}

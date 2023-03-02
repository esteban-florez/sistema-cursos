<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Course;
use App\Models\User;
use App\Models\PNF;
use App\Services\Input;

class CourseController extends Controller
{
    // POLICY
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $search = $request->input('search');
        $sortColumn = $request->input('sort');

        $courses = Course::latest()
            ->filters($filters)
            ->search($search)
            ->sort($sortColumn)
            ->paginate(10)
            ->withQueryString();

        return view('courses.index', [
            'courses' => $courses,
            'filters' => $filters,
            'sort' => $sortColumn,
            'search' => $search,
            'areas' => Area::getOptions(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create', [
            'instructors' => User::getOptions('Instructor'), 
            'areas' => Area::getOptions(),
            'pnfs' => PNF::getOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/courses');
        }

        Course::create($data);

        return redirect()->route('courses.index')
            ->with('alert', trans('alerts.courses.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show', [
            'course' => $course,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
            'instructors' => User::getOptions('Instructor'), 
            'areas' => Area::getOptions(),
            'pnfs' => PNF::getOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/courses');
        }

        $course->update($data);

        return redirect()->route('courses.index')
            ->with('alert', trans('alerts.courses.updated'));
    }
}

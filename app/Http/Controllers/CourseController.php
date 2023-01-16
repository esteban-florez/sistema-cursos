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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $search = $request->input('search');
        $sortColumn = $request->input('sort');
        $areas = Area::getOptions();

        $courses = Course::filters($filters)
            ->search($search)
            ->sort($sortColumn)
            ->paginate(10)
            ->withQueryString();

        return view('courses.index', [
            'courses' => $courses,
            'filters' => $filters,
            'sort' => $sortColumn,
            'search' => $search,
            'areas' => $areas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = User::getOptions('instructor');
        $areas = Area::getOptions();
        $pnfs = PNF::getOptions();

        return view('courses.create', [
            'instructors' => $instructors, 
            'areas' => $areas,
            'pnfs' => $pnfs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            ->withSuccess('El curso se ha añadido con éxito');
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
        $instructors = User::getOptions('instructor');
        $areas = Area::getOptions();
        $pnfs = PNF::getOptions();

        return view('courses.edit', [
            'course' => $course,
            'instructors' => $instructors, 
            'areas' => $areas,
            'pnfs' => $pnfs,
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
            ->withWarning('El curso se ha editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->withDanger('El curso se ha eliminado con éxito');
    }
}

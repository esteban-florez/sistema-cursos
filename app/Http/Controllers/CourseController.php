<?php

namespace App\Http\Controllers;

use App\Events\CourseEvent;
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
    public function __construct() {
        $this->authorizeResource(Course::class);
    }

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

    public function create()
    {
        return view('courses.create', [
            'instructors' => User::getOptions('Instructor'), 
            'areas' => Area::getOptions(),
            'pnfs' => PNF::getOptions(),
        ]);
    }

    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/courses');
        }

        $course = Course::create($data);

        event(new CourseEvent($course));

        return redirect()->route('courses.index')
            ->with('alert', trans('alerts.courses.created'));
    }

    public function show(Course $course)
    {
        return view('courses.show', [
            'course' => $course,
        ]);
    }

    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
            'instructors' => User::getOptions('Instructor'), 
            'areas' => Area::getOptions(),
            'pnfs' => PNF::getOptions(),
        ]);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/courses');
        }

        $course->update($data);

        event(new CourseEvent($course));

        return redirect()->route('courses.index')
            ->with('alert', trans('alerts.courses.updated'));
    }
}

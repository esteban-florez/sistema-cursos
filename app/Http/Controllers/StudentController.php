<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Services\Input;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $sortColumn = $request->input('sort', '');
        $search = $request->input('search', '');

        $students = Student::filters($filters)
            ->search($search)
            ->sort($sortColumn)
            ->paginate(10)
            ->withQueryString();

        return view('students.index', [
            'students' => $students,
            'search' => $search,
            'sort' => $sortColumn,
            'filters' => $filters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'first_name' => ['required', 'max:30'],
            'second_name' => ['nullable', 'max:30'],
            'first_lastname' => ['required', 'max:30'],
            'second_lastname' => ['nullable', 'max:30'],
            'password' => [
                'required', 'confirmed', 'max:50',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'image' => ['nullable', 'file','image', 'max:2048'],
            'ci' => ['required', 'integer', 'numeric', 'unique:students'],
            'ci_type' => ['required', 'in:V,E'],
            'email' => ['required', 'email', 'max:50', 'unique:students'],
            'birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'digits:11'],
            'grade' => ['required', 'in:school,high,tsu,college'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        Student::create($data);

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/profiles');
        } else {
            unset($data['image']);
        }

        return redirect()->route('students.index')
            ->withSuccess('El estudiante se ha añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $uniqueIgnore = Rule::unique('students')->ignoreModel($student);

        $data = $request->validate([
            'first_name' => ['required', 'max:30'],
            'second_name' => ['nullable', 'max:30'],
            'first_lastname' => ['required', 'max:30'],
            'second_lastname' => ['nullable', 'max:30'],
            'ci' => ['required', 'integer', 'numeric', $uniqueIgnore],
            'ci_type' => ['required', 'in:V,E'],
            'image' => ['nullable', 'file', 'image', 'max:2048'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'digits:11'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:50', $uniqueIgnore],
            'password' => [
                'required', 'max:50', 'confirmed', 
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'grade' => ['required', 'in:school,high,tsu,college'],
            'birth' => ['required', 'date'],
        ]);

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/profiles');
        } else {
            unset($data['image']);
        }

        $student->update($data);

        return redirect()->route('students.index')
            ->withWarning('El estudiante se ha editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->withDanger('El estudiante se ha eliminado con éxito.');
    }
}

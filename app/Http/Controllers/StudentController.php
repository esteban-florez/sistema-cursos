<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function create()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $student = $request->validate([
            'password' => ['required', 'confirmed', 'min:8', 'max:20'],
            'first_name' => ['required', 'max:25'],
            'second_name' => ['max:20'],
            'first_lastname' => ['required', 'max:25'],
            'second_lastname' => ['max:20'],
            'ci' => ['required', 'max:25'],
            'ci_type' => ['required'],
            'email' => ['required', 'email', 'max:50', 'unique:students,email'],
            'birth' => ['required', 'date'],
            'gender' => ['required'],
            'phone' => ['required', 'max:25'],
            'grade' => ['required'],
            'address' => ['required', 'string', 'max:150'],
        ]);
        
        Student::create($student);

        return redirect()->route('login');
    }
}

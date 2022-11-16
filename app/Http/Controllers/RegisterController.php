<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $student = $request->validate([
            'first_name' => ['required', 'max:30'],
            'second_name' => ['nullable', 'max:30'],
            'first_lastname' => ['required', 'max:30'],
            'second_lastname' => ['nullable', 'max:30'],
            'password' => [
                'required', 'confirmed', 'max:50',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'ci' => ['required', 'integer', 'numeric', 'unique:students'],
            'ci_type' => ['required', 'in:V,E'],
            'email' => ['required', 'email', 'max:50', 'unique:students'],
            'birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'digits:11'],
            'grade' => ['required', 'in:school,high,tsu,college'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        
        Student::create($student);

        return redirect()->route('login');
    }
}

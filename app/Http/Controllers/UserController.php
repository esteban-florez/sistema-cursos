<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'password' => ['required', 'confirmed', 'min:8', 'max:20'],
            'first_name' => ['required', 'max:25'],
            'second_name' => ['max:20'],
            'first_lastname' => ['required', 'max:25'],
            'second_lastname' => ['max:20'],
            'ci' => ['required', 'max:25'],
            'ci_type' => ['required'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email'],
            'birth' => ['required', 'date'],
            'gender' => ['required'],
            'phone' => ['required', 'max:25'],
            'grade' => ['required'],
            'address' => ['required', 'string', 'max:150'],
        ]);
        
        $user = User::create([
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'first_lastname' => $request->first_lastname,
            'second_lastname' => $request->second_lastname,
            'ci' => $request->ci,
            'ci_type' => $request->ci_type,
            'email' => $request->email,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'grade' => $request->grade,
            'address' => $request->address
        ]);

        return redirect()->route('login');
    }
}

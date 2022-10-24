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
        $user = User::create([
            'username' => $request->username,
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

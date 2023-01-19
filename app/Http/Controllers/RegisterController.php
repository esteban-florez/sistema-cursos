<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('signup');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return redirect()
            ->route('login')
            ->with('registered', '¡Te has registrado con éxito!');
    }
}

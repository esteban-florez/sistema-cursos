<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('signup');
    }

    public function store()
    {
        return request()->all();
    }
}

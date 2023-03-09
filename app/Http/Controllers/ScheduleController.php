<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {
       $this->middleware('role:Estudiante,Instructor'); 
    }

    public function __invoke()
    {
        return view('schedule', [
            'user' => Auth::user(),
        ]);
    }
}

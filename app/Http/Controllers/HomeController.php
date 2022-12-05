<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $clubs = Club::all()->last()->take(2)->get();
        $courses = Course::all()->last()->take(2)->get();

        return view('home', [
            'clubs' => $clubs,
            'courses' => $courses,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function create(Course $course)
    {
        return view('enrollment.create', [
            'course' => $course,
        ]);
    }
}

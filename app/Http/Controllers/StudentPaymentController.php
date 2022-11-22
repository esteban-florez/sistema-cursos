<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentPaymentController extends Controller
{
    public function index(Student $student)
    {
        dd($student->courses);
    }
}

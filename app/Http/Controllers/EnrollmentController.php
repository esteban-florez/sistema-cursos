<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;

class EnrollmentController extends Controller
{
    public function create(Course $course)
    {
        return view('enrollment.create', [
            'course' => $course,
            'enrolledType' => session()->get('enrolledType', 'null'),
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $registry = user()->enroll($course);
        
        $data = $request->validate([
            'date' => ['required', 'date'],
            'ref' => ['nullable', 'integer', 'numeric'],
            'amount' => ['required', 'integer', 'numeric'],
            'type' => ['required', 'in:movil,transfer,dollars,bs'],
        ]);

        $data['registry_id'] = $registry->id;

        $payment = Payment::create($data);

        return redirect()->route('enrollment.create', $course->id)->with('enrolledType', $payment->type);
    }
}

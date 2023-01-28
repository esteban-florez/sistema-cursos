<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Models\MovilCredentials;
use App\Models\TransferCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $course = Course::findOrFail($request->input('course'));
        $search = $request->input('search');
        
        $enrollments = Enrollment::whereBelongsTo($course)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        
        return view('enrollments.index', [
            'course' => $course,
            'enrollments' => $enrollments,
            'search' => $search,
        ]);
    }

    public function create(Request $request)
    {
        $course = Course::findOrFail($request->input('course'));
        $credentials = new stdClass;
        
        $credentials->movil = MovilCredentials::select(
            ['ci', 'bank', 'phone'])->firstOrFail();
        
        $credentials->transfer = TransferCredentials::select(
            ['name', 'ci', 'bank', 'account', 'type'])->firstOrFail();

        return view('enrollments.create', [
            'course' => $course,
            'credentials' => $credentials,
        ]);
    }

    public function store(EnrollmentRequest $request)
    {
        $enrollment = Enrollment::create([
            'course_id' => Course::findOrFail($request->input('course'))->id,
            'user_id' => Auth::user()->id,
            'mode' => $request->safe()->only('mode'),
        ]);
        
        $payment = Payment::create([
            ...$request->safe()->except('mode'),
            'enrollment_id' => $enrollment->id,
        ]);

        return redirect()
            ->route('enrollments.success', $enrollment->id)
            ->with('enrolledType', $payment->type);
    }

    public function success(Enrollment $enrollment)
    {
        // TODO -> solución por ahora pa que los otros estudiantes no vean las planillas de uno
        // if ($enrollment->user_id !== Auth::user()->id) {
        //     return redirect()->route('home');
        // }

        return view('enrollments.success', [
            'enrollment' => $enrollment,
            // BROKEN
            'enrolledType' => 'Pago Móvil',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
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
        
        $enrollments = Enrollment::with('payment', 'student')
            ->whereBelongsTo($course)
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
        $credentials->movil = MovilCredentials::first();
        $credentials->transfer = TransferCredentials::first();

        return view('enrollments.create', [
            'course' => $course,
            'credentials' => $credentials,
        ]);
    }

    public function store(PaymentRequest $request)
    {
        $course = Course::findOrFail($request->input('course'));
        // TODO -> Mejorar este codigo. Esto es para prevenir que la ref sea nula en caso de que elijan transfer o movil.
        $type = $request->input('type');

        if ($type === 'transfer' || $type === 'movil') {
            if ($request->input('ref') === null) {
                return redirect()
                ->back()
                ->withDanger('El campo de referencia no puede estar vacío.');
            }
        }

        $data = $request->validated();

        $enrollment = Auth::user()->enroll($course);
        
        $data['enrollment_id'] = $enrollment->id;
        
        $payment = Payment::create($data);

        return redirect()
            ->route('enrollments.success', $enrollment->id)
            ->with('enrolledType', $payment->type);
    }

    public function success(Enrollment $enrollment)
    {
        // TODO -> solución por ahora pa que los otros estudiantes no vean las planillas de uno
        if ($enrollment->user_id !== Auth::user()->id) {
            return redirect()->route('home');
        }

        return view('enrollments.success', [
            'enrollment' => $enrollment,
            'enrolledType' => $enrollment->payment->type,
        ]);
    }
}

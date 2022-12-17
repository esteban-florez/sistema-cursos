<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Inscription;
use App\Models\MovilCredentials;
use App\Models\TransferCredentials;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use stdClass;

class EnrollmentController extends Controller
{
    public function create(Course $course)
    {
        $credentials = new stdClass;
        $credentials->movil = MovilCredentials::first();
        $credentials->transfer = TransferCredentials::first();

        return view('enrollment.create', [
            'course' => $course,
            'credentials' => $credentials,
        ]);
    }

    public function store(Request $request, Course $course)
    {
        // TODO -> Mejorar este codigo. Esto es para prevenir que la ref sea nula en caso de que elijan transfer o movil.
        $type = $request->input('type');

        if ($type === 'transfer' || $type === 'movil') {
            if ($request->input('ref') === null) {
                return redirect()
                    ->back()
                    ->withDanger('El campo de referencia no puede estar vacío.');
            }
        }

        $data = $request->validate([
            'date' => ['required', 'date'], // TODO -> esto no es necesario ya
            'ref' => ['nullable', 'integer', 'numeric'],
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:movil,transfer,dollars,bs'],
        ]);

        $inscription = user()->enroll($course);
        
        $data['inscription_id'] = $inscription->id;
        
        $payment = Payment::create($data);

        return redirect()
            ->route('enrollment.success', $inscription->id)
            ->with('enrolledType', $payment->type);
    }

    public function success(Inscription $inscription)
    {
        // TODO -> solución por ahora pa que los otros estudiantes no vean las planillas de uno
        if ($inscription->student_id !== user()->id) {
            return redirect()->route('home');
        }

        return view('enrollment.success', [
            'inscription' => $inscription,
            'enrolledType' => $inscription->payment->type,
        ]);
    }

    public function download(Inscription $inscription)
    {
        // TODO -> solución por ahora pa que los otros estudiantes no vean las planillas de uno
        if ($inscription->student_id !== user()->id) {
            return redirect()->route('home');
        }

        $student = $inscription->student;
        $course = $inscription->course;

        $pdf = PDF::loadView('pdf.enroll', [
            'student' => $student,
            'course' => $course,
            'date' => now()->format('d/m/Y'),
            'logo' => base64('img/logo-upta.png'),
        ]);

        $filename = "{$student->full_name} - Planilla de Inscripción.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class CertificatePDFController extends Controller
{
    public function __invoke(Enrollment $enrollment)
    {
        $student = $enrollment->student;

        $pdf = PDF::loadView('pdf.certificate', [
            'student' => $student,
            'course' => $enrollment->course,
            'date' => now()->format(DF),
            'logo' => base64('img/logo-upta.png'),
            'bg' => base64('img/certificate-bg.png'),
        ])->setPaper('a4', 'landscape');;


        $filename = "{$student->full_name} - Certificado de Aprobación.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();       
    }
}

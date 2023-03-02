<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PaymentPDFController extends Controller
{
    // GATE
    public function __invoke()
    {
        $payments = Payment::with('enrollment.course', 'enrollment.student')
            ->get();

        $pdf = PDF::loadView('pdf.payments', [
            'payments' => $payments,
            'date' => now()->format(DF),
            'logo' => base64('img/logo-upta.png'),
        ])->setPaper('a4', 'landscape');

        $filename = "Reporte de Pagos - Vinculación Social.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }
}

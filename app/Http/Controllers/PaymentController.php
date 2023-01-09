<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Course;
use App\Services\Input;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PaymentController extends Controller
{
    // TODO -> falta el edit y update
    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $sort = $request->input('sort');
        $search = $request->input('search');
        
        $payments = Payment::with('inscription.student', 'inscription.course')
            ->filters($filters)
            ->search($search)
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();

        return view('payments.index', [
            'payments' => $payments,
            'filters' => $filters,
            'sort' => $sort,
            'search' => $search,
            'courses' => Course::getOptions(),
        ]);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index');
    }

    public function download()
    {
        $payments = Payment::with('inscription.course', 'inscription.student')
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

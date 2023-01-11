<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\Course;
use App\Services\Input;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PaymentController extends Controller
{
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

    public function edit(Payment $payment)
    {
        return view('payments.edit', [
            'payment' => $payment,
        ]);
    }

    public function update(PaymentRequest $request, Payment $payment)
    {
        $data = $request->validated();

        $payment->update([
            ...$data,
            'status' => 'Pendiente',
        ]);

        return redirect()
            ->route('students-payments.index', user()->id)
            ->withWarning('El pago se ha actualizado exitosamente.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->withDanger('El pago se ha eliminado exitosamente.');
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

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ItemPDFController extends Controller
{
    // GATE
    public function __invoke()
    {
        $items = Item::latest()
            ->with('operations')
            ->paginate(10)
            ->withQueryString();

        $pdf = PDF::loadView('pdf.items', [
            'items' => $items,
            'date' => now()->format(DF),
            'logo' => base64('img/logo-upta.png'),
        ])->setPaper('a4', 'landscape');

        $filename = "Estado de Inventario.pdf"; 
        $path = public_path($filename);
        $pdf->save($filename);
        
        return response()
            ->download($path)
            ->deleteFileAfterSend();
    }
}

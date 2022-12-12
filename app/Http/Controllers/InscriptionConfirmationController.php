<?php

namespace App\Http\Controllers;

use App\Models\Inscription;

class InscriptionConfirmationController extends Controller
{
    public function update(Inscription $inscription)
    {
        $inscription->update([
            'confirmed_at' => now(),
        ]);
        
        return redirect()
            ->route('inscriptions.index', [
                'course' => $inscription->course->id
                ]);
    }
}

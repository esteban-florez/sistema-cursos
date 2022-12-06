<?php

namespace App\Http\Controllers;

use App\Models\Inscription;

class InscriptionApprovalController extends Controller
{
    public function update(Inscription $inscription)
    {
        if($inscription->approved_at) {
            $inscription->approved_at = null;
        } else {
            $inscription->approved_at = now();    
        }

        $inscription->save();

        return redirect()
            ->route('inscriptions.index', [
                'course' => $inscription->course,
            ]);
    }
}

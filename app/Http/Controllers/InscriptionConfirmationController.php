<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionConfirmationController extends Controller
{
    public function update(Inscription $inscription)
    {
        $inscription->update([
            'confirmed_at' => now(),
        ]);
        
        return redirect()->route('courses.students.index', $inscription->course->id);
    }
}

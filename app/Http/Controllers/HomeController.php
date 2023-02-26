<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        
        $clubs = Club::latest()
            ->orderby('id', 'desc')
            ->limit(2)
            ->get();

        $courses = Course::Availables()
            ->orderby('id', 'desc')
            ->limit(2)
            ->get();
            
        $payments = Payment::unfulfilled()
            ->orderBy('id', 'desc')
            ->limit(1)
            ->get();

        if ($user->role === 'Administrador') {
            $payments = Payment::where('status', 'Pendiente',)
                ->orderBy('id', 'desc')
                ->limit(2)
                ->get();
        }
            
        return view('home.index', [
            'user' => $user,
            'clubs' => $clubs,
            'courses' => $courses,
            'payments' => $payments,
        ]);
    }
}

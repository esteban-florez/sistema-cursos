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

        $courses = Course::when(
            $user->role === 'Estudiante',
            fn($query) => $query->availables()->notBoughtBy($user))
            ->orderby('id', 'desc')
            ->limit(2)
            ->get();

        $payments = Payment::where('status', 'Pendiente',)
            ->orderby('id', 'desc')
            ->limit(2)
            ->get();

        if ($user->role === 'Administrador') {
            return view('home.admin', [
                'clubs' => $clubs,
                'courses' => $courses,
                'payments' => $payments,
            ]);
        }

        if ($user->role === 'Estudiante') {
            return view('home.student', [
                'clubs' => $clubs,
                'courses' => $courses,
                'payments' => $payments,
            ]);
        }
    }
}

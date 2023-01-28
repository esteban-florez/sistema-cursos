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
            ->limit(2)
            ->get();

        $courses = Course::when(
            $user->role === 'Estudiante',
            fn($query) => $query->availables()->notBoughtBy($user))
            ->latest()
            ->limit(2)
            ->get();

        $payments = Payment::latest()
            ->limit(2)
            ->get();

        return view('home', [
            'clubs' => $clubs,
            'courses' => $courses,
            'payments' => $payments,
        ]);
    }
}

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
            ->get()
            ->take(2);

        $courses = Course::when(
            $user->role === 'Estudiante',
            fn($query) => $query->availables()->notBoughtBy($user))
            ->latest()
            ->get()
            ->take(2);

        $payments = Payment::latest()
            ->get()
            ->take(2);

        return view('home', [
            'clubs' => $clubs,
            'courses' => $courses,
            'payments' => $payments,
        ]);
    }
}

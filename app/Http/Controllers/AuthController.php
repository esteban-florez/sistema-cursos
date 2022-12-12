<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        foreach(guards() as $guard) {
            if (Auth::guard($guard)->attempt($credentials)) {
                return $this->loggedIn($request);
            }
        }
        
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ]);
    }
    
    public function logout(Request $request)
    {
        foreach (guards() as $guard) {
            Auth::guard($guard)->logout();
        }
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }

    private function loggedIn(Request $request)
    {
        $request->session()->regenerate();
        return redirect()->home();
    }
}

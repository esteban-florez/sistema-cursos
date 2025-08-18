<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function create(Request $request) {
        $hide = Cookie::get('hide-demo-modal');

        return response()
            ->view('login', ['modal' => !$hide])
            ->cookie('hide-demo-modal', 'true');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'min:6', 'max:50'],
            'password' => ['required', 'max:20', Password::defaults()],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->home();
        }
        
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ]);
    }
    
    public function destroy(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}

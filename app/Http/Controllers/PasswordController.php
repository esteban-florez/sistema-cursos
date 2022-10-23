<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function forgot() {
        return view('forgot-password');
    }
    
    public function mail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => $status])
            : back()->withErrors(['email' => 'El email es incorrecto.']);
    }
        
    public function edit($token) {
        return view('reset-password', [
            'token' => $token
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:20','confirmed']
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => $status])
            : back()
                ->withErrors(['email' => 'Error en la recuperación de contraseña.']);
    }
}

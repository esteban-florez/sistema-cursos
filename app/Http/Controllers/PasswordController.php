<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;

class PasswordController extends Controller
{
    // TODO -> aun no me decido si "crudizar" estos metodos y pasar a FormRequest, o no
    public function forgot() {
        return view('password.forgot');
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
            : back()
                ->withErrors(['email' => trans('passwords.user')]);
    }
        
    public function edit($token, $email) {
        return view('password.reset', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => ['required', 'email'],
            'password' => [
                'required', 'max:20', 'confirmed', 
                PasswordRule::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
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
                ->withErrors(['email' => trans('passwords.failure')]);
    }
}

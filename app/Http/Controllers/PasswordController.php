<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;

class PasswordController extends Controller
{
    public function forgot() {
        return view('password.forgot');
    }
    
    public function mail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'min:6', 'max:50']
        ]);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => $status])
            : back()
                ->withErrors(['invalid' => trans('passwords.user')]);
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
            'email' => ['required', 'email', 'min:6', 'max:50'],
            'password' => ['required', 'max:20', 'confirmed', PasswordRule::defaults()],
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
                ->withErrors(['invalid' => trans('passwords.failure')]);
    }

    public function change() 
    {
        return view('password.change', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request) 
    {
        $user = Auth::user();

        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'max:20', PasswordRule::defaults(), 'confirmed'],
        ]);

        $user->update($data);

        return redirect()->route('users.show', $user)
            ->with('alert', trans('alerts.password.updated'));
    }
}

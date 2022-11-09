<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('guards')) {
    function guards()
    {
        return collect(config('auth.guards'))->keys()->all();
    }
}

if (!function_exists('getCurrentRole')) {
    function getCurrentRole()
    {
        if (Auth::guard('student')->check()) {
            return 'student';
        } else if (Auth::guard('instructor')->user()->is_admin) {
            return 'admin';
        }
        return 'instructor';
    }
}

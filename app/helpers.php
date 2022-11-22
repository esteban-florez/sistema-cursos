<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('guards')) {
    /**
     * Retrive application auth guards.
     * 
     * @return string
     */
    function guards()
    {
        return collect(config('auth.guards'))->keys()->all();
    }
}

if (!function_exists('getCurrentRole')) {
    /**
     * Returns current user role.
     * 
     * @return string
     */
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

if (!function_exists('user')) {
    /**
     * Returns current logged user.
     * 
     * @return App\Models\Student|App\Models\Instructor
     */
    function user() {
        return Auth::guard('instructor')->user() ?? Auth::user();
    }
}

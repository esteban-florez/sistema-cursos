<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

if (!function_exists('guards')) {
    /**
     * Retrive application auth guards.
     * 
     * @return array
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

if (!function_exists('formatDate')) {
    function formatDate($dbDate) {
        $date = Date::createFromFormat('Y-m-d', $dbDate);
        return $date->format('d/m/Y');
    }
}

if (!function_exists('formatTime')) {
    function formatTime($dbTime) {
        $time = Date::createFromFormat('H:i:s', $dbTime);
        return $time->format('g:i A');
    }
}

if (!function_exists('week')) {
    function days() {
        return collect([
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado',
            'Domingo',
        ]);
    }
}

if (!function_exists('genders')) {
    function genders() {
        return collect(['Masculino', 'Femenino']);
    }
}

if (!function_exists('grades')) {
    function grades() {
        return collect(['Primaria', 'Bachillerato', 'TSU', 'Superior']);
    }
}

if (!function_exists('ciTypes')) {
    function ciTypes() {
        return collect(['V', 'E']);
    }
}

if (!function_exists('operations')) {
    function operations() {
        return collect(['+', '-']);
    }
}

if (!function_exists('payStatuses')) {
    function payStatuses() {
        return collect(['Pendiente', 'Confirmado', 'Rechazado']);
    }
}

if (!function_exists('payTypes')) {
    function payTypes() {
        return collect([
            'Pago Móvil',
            'Transferencia',
            'Efectivo ($)',
            'Efectivo (Bs.D.)'
        ]);
    }
}

if (!function_exists('accountTypes')) {
    function accountTypes() {
        return collect([
            'Corriente',
            'Ahorro',
        ]);
    }
}
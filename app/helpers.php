<?php

use Illuminate\Support\Str;

define('DV', 'Y-m-d');
define('TV', 'H:i');
define('DF', 'd/m/Y');
define('TF', 'g:i A');

if (!function_exists('str')) {
    function str($value) {
        return Str::of($value);
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

if (!function_exists('roles')) {
    function roles($withAdmin = false) {
        $roles =  collect([
            'Administrador',
            'Instructor',
            'Estudiante',
        ]);

        if ($withAdmin) {
            return $roles;
        }

        return $roles->skip(1);
    }
}

if (!function_exists('base64')) {
    function base64($path) {
        return base64_encode(file_get_contents(public_path($path)));
    }
}

if (!function_exists('randomNumericString')) {
    function randomNumericString($length) {
        return (string) rand(pow(10, $length - 1), pow(10, $length)-1);
    }
}

if (!function_exists('backWithoutQuery')) {
    /** 
     * Create a new redirect response to the previous location without query string parameters.
     * 
     * @return \Illuminate\Http\RedirectResponse
    */
    function backWithoutQuery($status = 302, $headers = []) {
        $back = explode('?', url()->previous())[0];
        return redirect($back, $status, $headers);
    }
}
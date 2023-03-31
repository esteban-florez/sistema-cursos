<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Services\Backup;

class SystemRestoreController extends Controller
{
    public function create()
    {
        return view('system-restore');
    }

    public function store(Request $request)
    {
        $user = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $dbname = env('DB_DATABASE');

        $request->validate([
            'username' => ['required', "in:{$user}"],
            'password' => ['required', "in:{$password}"],
            'backup' => ['required', 'file', 'mimetypes:application/zip'],
        ], [
            'username.in' => 'Credencial inválida.',
            'password.in' => 'Credencial inválida.',
        ]);

        Artisan::call('migrate:fresh');

        $backup = Backup::store($request->file('backup'));

        $backup->apply();

        return redirect()
            ->route('login')
            ->with('registered', '¡El sistema se ha restaurado con éxito!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Backup;

class BackupController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

    public function manage()
    {
        // TODO -> paginacion de backups
        $lastestBackupDate = 'N/A';
        $backups = Backup::all();

        if ($backups->count() > 0) {
            $lastestBackupDate = $backups->first()->date;
        }

        return view('database', [
            'date' => $lastestBackupDate,
            'backups' => $backups,
        ]);
    }

    public function generate()
    {
        $base = base_path();
        
        shell_exec("cd {$base} && php artisan backup:run");

        return redirect()
            ->route('backups.manage')
            ->with('alert', trans('alerts.backups.dumped'));
    }

    public function download($filename)
    {
        $backup = Backup::find($filename);

        return response()
            ->download($backup->file);
    }

    public function recover($filename)
    {
        // TODO -> recuperar base de datos y archivos.
    }

    public function delete($filename)
    {
        $backup = Backup::find($filename);

        $backup->delete();
        
        return redirect()
            ->route('backups.manage')
            ->with('alert', trans('alerts.backups.deleted'));
    }
}

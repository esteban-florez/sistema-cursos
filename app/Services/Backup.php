<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use ZipArchive;

class Backup
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function apply()
    {
        $publicStorage = storage_path('app/public');
        $publicBackup = storage_path('app/backup-temp/storage/app/public');
        $tempDir = storage_path('app/backup-temp');

        $zip = new ZipArchive();        
        $zip->open($this->file->getRealPath());
        $zip->extractTo($tempDir);

        File::deleteDirectory($publicStorage);
        File::copyDirectory($publicBackup, $publicStorage);
        File::deleteDirectory($publicBackup);
        
        $sql = File::get(
            storage_path('app/backup-temp/db-dumps/mysql-vinculacion_social.sql')
        );
        
        Artisan::call('db:wipe');

        DB::unprepared($sql);

        File::cleanDirectory($tempDir);
    }
    
    public static function all() {
        $path = storage_path('app/Vinculacion-Social');

        return collect(File::files($path))
            ->map(function ($file) {
                return new self($file);
            })
            ->reverse()
            ->take(5);
    }
        
    public static function exists($filename)
    {
        return static::find($filename) !== null;
    }

    public static function find($filename) {
        return static::all()->filter(function ($file) use ($filename) {
            return $file->name === $filename;
        })->first();
    }

    public static function store($file)
    {
        $path = storage_path('app/Vinculacion-Social');
        $filename = $file->getClientOriginalName();
        $filepath = "{$path}/{$filename}";

        File::chmod($path, 777);
        File::copy($file->getRealPath(), $filepath);

        return self::find($filename);
    }

    public function delete()
    {
        $path = $this->file->getRealPath();
        File::delete($path);
    }

    public function __get($name)
    {
        $props = collect(['date', 'size', 'name', 'file']);

        if (!$props->contains($name)) return null;

        return $this->{$name}();
    }

    public function name()
    {
        return $this->file->getFilename();
    }

    public function date()
    {
        $date = Date::createFromTimestamp($this->file->getCTime());
        return "{$date->format(DF)} a las {$date->format(TF)}";
    }

    public function size()
    {
        return $this->sizeOnMB($this->file->getSize());
    }

    public function file()
    {
        return $this->file;
    }

    private function sizeOnMB($bytes, $decimals = 2)
    {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }
}
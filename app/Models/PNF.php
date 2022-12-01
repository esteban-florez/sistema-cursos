<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNF extends Model
{
    use HasFactory;

    protected $table = 'pnfs';
    
    public static $pnfNames = [
        'Extensión Universitaria',
        'Administración',
        'Agroalimentación',
        'Contaduría Pública',
        'Electricidad',
        'Electrónica',
        'Informática',
        'Instrumentación y Control',
        'Mantenimiento',
        'Mecánica',
        'Sistemas de Calidad y Ambiente',
        'Telecomunicaciones',
    ];

    public static function getOptions($withDefault = true)
    {
        $areas = self::all(['id', 'name']);

        $options = $areas->mapWithKeys(function ($area) {
            return [$area->id => $area->name];
        })->sortKeys()->all();

        if ($withDefault) {
            $defaultOptions = ['' => 'Todos'];
            return $defaultOptions + $options;
        }

        return $options;
    }
}

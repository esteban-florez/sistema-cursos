<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNF extends Model
{
    use HasFactory;

    protected $table = 'pnfs';
    
    public static $pnfs = [
        'Extensión Universitaria' => 'N/A',
        'Administración' => '(JD Adminitración)',
        'Agroalimentación' => '(JD Agroalimentación)',
        'Contaduría Pública' => '(JD Contaduría Pública)',
        'Electricidad' => '(JD Electricidad)',
        'Electrónica' => '(JD Electrónica)',
        'Informática' => 'Anyerg Martínez',
        'Instrumentación y Control' => '(JD Instrumentación y Control)',
        'Mantenimiento' => '(JD Mantenimiento)',
        'Mecánica' => '(JD Mecánica)',
        'Sistemas de Calidad y Ambiente' => '(JD Sistemas de Calidad y Ambiente)',
        'Telecomunicaciones' => '(JD Telecomunicaciones)',
    ];

    public static function getOptions()
    {
        $pnfs = self::all(['id', 'name']);

        $options = $pnfs->mapWithKeys(fn($pnf) => [$pnf->id => $pnf->name])
            ->sortKeys()
            ->all();
            
        return $options;
    }
}

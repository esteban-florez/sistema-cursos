<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PNF;

class PNFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PNF::truncate();

        $pnfs = [
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
            'Ciencias Básicas',
            'Estudios Generales',
        ];
        
        foreach ($pnfs as $name) {
            PNF::create([
                'name' => $name,
            ]);
        }
    }
}

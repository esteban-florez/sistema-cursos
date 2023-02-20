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
        ]
        
        foreach ($pnfs as $name => $leader) {
            PNF::create([
                'name' => $name,
                'leader' => $leader,
            ]);
        }
    }
}

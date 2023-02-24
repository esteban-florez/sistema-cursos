<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();

        Item::create([
            'code' => '0001',
            'name' => 'Balón Tamanaco',
            'description' => 'Balón de Fútbol Sala de cuero sintético Marca Tamanaco.',
        ]);

        Item::create([
            'code' => '0002',
            'name' => 'Cono de Entrenamiento',
            'description' => 'Conos de Entrenamiento tipo minas, de plástico, flexibles y resistentes.',
        ]);

        Item::create([
            'code' => '0003',
            'name' => 'Guantes de Boxeo',
            'description' => 'Guantes de Boxeo marca Regent modelo 12 OZ.',
        ]);

        Item::create([
            'code' => '0004',
            'name' => 'Balón de Voleyball',
            'description' => 'Balón de Voleyball marca Mikasa modelo MVA380K colores clásicos.',
        ]);

        Item::create([
            'code' => '0005',
            'name' => 'Malla de Voleyball',
            'description' => 'Malla de Voleyball de polietileno con cinta de PVC, color blanco.',
        ]);
    }
}

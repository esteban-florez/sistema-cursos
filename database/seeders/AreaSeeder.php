<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::truncate();

        Area::factory([
            'name' => 'Informática',
            'is_pnf' => true,
            'pnf_name' => 'Informática',
        ])->create();
    }
}

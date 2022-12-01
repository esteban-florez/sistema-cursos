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
        
        foreach (PNF::$pnfNames as $name) {
            PNF::create([
                'name' => $name,
            ]);
        }
    }
}

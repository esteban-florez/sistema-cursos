<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::truncate();

        Club::factory([
            'name' => 'Futbol',
            'description' => 'Desarrolla tus habilidades deportivas a través de este club.',
            'day' => 'mo',
            'start_hour' => '08:00:00',
            'end_hour' => '12:00:00',
            'instructor_id' => 2,
        ])->create();
        
        Club::factory(5)->create();
    }
}

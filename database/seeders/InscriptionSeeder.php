<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscription;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscription::truncate();
        
        for ($i = 1; $i <= 5; $i++) {
            Inscription::create([
                'student_id' => $i,
                'course_id' => $i,
                'unique' => null,
            ]);
        }

        for ($i = 2; $i <= 5; $i++) {
            Inscription::create([
                'student_id' => $i,
                'course_id' => 1,
                'unique' => null,
            ]);
        }
    }
}

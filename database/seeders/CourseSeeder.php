<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory([
            'name' => 'Programación Web',
            'description' => 'Curso de Programación Web con HTML, CSS, JavaScript, PHP, y MySQL',
            'total_price' => 45,
            'price_ins' => 10,
        ]);
    }
}

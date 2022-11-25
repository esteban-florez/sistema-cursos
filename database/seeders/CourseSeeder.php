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
        Course::truncate();

        Course::factory([
            'name' => 'Programación Web',
            'description' => 'Curso de Programación Web con HTML, CSS, JavaScript, PHP, MySQL. Aprende las bases del desarrollo web con este curso básico perfecto para principiantes.',
            'start_ins' => '2023-01-01',
            'end_ins' => '2023-01-07',
            'start_course' => '2023-01-08',
            'end_course' => '2023-01-28',
            'duration' => 24,
            'start_time' => '08:00:00',
            'end_time' => '12:00:00',
            'area_id' => 1,
            'instructor_id' => 2,
        ])->create();

        Course::factory(4)->create();
    }
}

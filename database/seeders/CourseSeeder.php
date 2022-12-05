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
            'total_price' => 45,
            'start_ins' => '2022-12-05',
            'end_ins' => '2022-12-11',
            'start_course' => '2022-12-12',
            'end_course' => '2023-01-08',
            'duration' => 24,
            'student_limit' => 6,
            'start_time' => '08:00:00',
            'end_time' => '12:00:00',
            'days' => 'sa',
            'image' => 'img/programacion-web.jpg',
            'area_id' => 1,
            'instructor_id' => 2,
        ])->create();

        Course::factory([
            'name' => 'JavaScript Desde Cero',
            'description' => 'Curso de JavaScript para principiantes en la programación. Aprende uno de los lenguajes mas usados en la actualidad y preparate para ser un desarrollador web.',
            'start_ins' => '2022-12-01',
            'end_ins' => '2022-12-07',
            'start_course' => '2022-12-08',
            'end_course' => '2022-12-28',
            'duration' => 24,
            'start_time' => '09:00:00',
            'end_time' => '12:00:00',
            'days' => 'tu,th',
            'image' => 'img/javascript.jpg',
            'area_id' => 1,
            'instructor_id' => 3,
        ])->create();

        Course::factory([
            'name' => 'Administración de Empresas',
            'description' => 'En este curso aprendrás las bases fundamentales de la administración. Potencia tu aprendizaje universitario, y conviértete en un profesional.',
            'start_ins' => '2022-12-01',
            'end_ins' => '2022-12-07',
            'start_course' => '2022-12-08',
            'end_course' => '2022-12-28',
            'duration' => 24,
            'start_time' => '09:00:00',
            'end_time' => '11:00:00',
            'days' => 'mo',
            'image' => 'img/administracion.jpg',
            'area_id' => 1,
            'instructor_id' => 3,
        ])->create();

        Course::factory([
            'name' => 'Cocina Profesional',
            'description' => 'En este curso de Cocina profesional aprenderás aplicar los procesos asociados en la gastronomía, con el fin de producir platillos de alta calidad. Es fácil de aprender y solo se requiere tener conocimientos elementales.',
            'start_ins' => '2022-11-15',
            'end_ins' => '2022-11-21',
            'start_course' => '2022-11-22',
            'end_course' => '2022-12-12',
            'duration' => 12,
            'start_time' => '14:00:00',
            'end_time' => '16:00:00',
            'days' => 'sa',
            'image' => 'img/cocina.jpg',
            'area_id' => 3,
            'instructor_id' => 7,
        ])->create();
        
        Course::factory([
            'name' => 'Fundamentos de la Matemática',
            'description' => 'En este curso aprenderás todo lo necesario para aprobar tus asignaturas de matemáticas en tu universidad. Desde los conceptos más básicos hasta ejercicios avanzados, todo explicado hasta el mínimo detalle.',
            'start_ins' => '2022-11-15',
            'end_ins' => '2022-11-21',
            'start_course' => '2022-11-21',
            'end_course' => '2022-12-04',
            'duration' => 12,
            'start_time' => '14:00:00',
            'end_time' => '16:00:00',
            'days' => 'sa',
            'image' => 'img/matematicas.jpg',
            'area_id' => 10,
            'instructor_id' => 14,
        ])->create();
    }
}

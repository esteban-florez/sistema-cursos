<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Date;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enrollment::truncate();
        
        // Curso en inscripciones
        for($i = 1; $i <= 5; $i++) {
            Enrollment::create([
                'student_id' => $i,
                'course_id' => 1,
            ]);
        }

        // Curso inscripciones para probar lo de enrollments:expired
        for ($i = 2; $i <= 12; $i++) {
            if($i === 2) {
                Enrollment::create([
                    'student_id' => $i,
                    'course_id' => 2,
                    'created_at' => Date::create(2022, 12, 2),
                ]);
                continue;
            }

            Enrollment::create([
                'student_id' => $i,
                'course_id' => 2,
            ]);    
        }

        // Curso activo
        for ($i = 2; $i < 10; $i++) { 
            if($i === 2) {
                // Estudiante no confirmado a proposito para probar 
                // lo de enrollments:unconfirmed
                Enrollment::create([
                    'student_id' => $i,
                    'course_id' => 4,
                ]);
                continue;
            }
            
            Enrollment::create([
                'student_id' => $i,
                'course_id' => 4,
                'confirmed_at' => Date::create(2022, 12, 6),
            ]);
        }
        
        // Curso finalizado
        for ($i = 2; $i < 10; $i++) { 
            Enrollment::create([
                'student_id' => $i,
                'course_id' => 5,
                'confirmed_at' => Date::create(2022, 12, 6),
            ]);
        }
    }
}

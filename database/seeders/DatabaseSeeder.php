<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Area;
use App\Models\Instructor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Student::factory([
            'email' => 'student@example.com',
            'password' => 'student',
            'first_name' => 'Esteban',
            'first_lastname' => 'Florez',
            ])->create();
            
        Student::factory(10)->create();

        Area::factory(10)->create();

        Instructor::factory([
            'email' => 'admin@example.com',
            'password' => 'admin',
            'name' => 'Edeblangel',
            'lastname' => 'Vanegas',
            'is_admin' => true,
        ])->create();

        Instructor::factory([
            'email' => 'teacher@example.com',
            'password' => 'teacher',
            'name' => 'Elías',
            'lastname' => 'Vargas',
        ])->create();

        Instructor::factory(10)->create();
    }
}

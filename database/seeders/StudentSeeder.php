<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        Student::factory([
            'email' => 'student@example.com',
            'password' => 'student',
            'first_name' => 'Esteban',
            'first_lastname' => 'Florez',
        ])->create();

        Student::factory(10)->create();
    }
}

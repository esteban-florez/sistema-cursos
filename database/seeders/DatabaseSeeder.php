<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Area;
use App\Models\Instructor;

use function PHPSTORM_META\map;

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
            'first_name' => 'Edeblangel',
            'first_lastname' => 'Vanegas',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'name' => 'Edeblangel',
            'lastname' => 'Vanegas',
            'is_admin' => true,
        ])->create();

        Instructor::factory([
            'email' => 'teacher@example.com',
            'password' => bcrypt('teacher'),
            'name' => 'Elías',
            'lastname' => 'Vargas',
        ])->create();

        Instructor::factory(10)->create();

    }
}

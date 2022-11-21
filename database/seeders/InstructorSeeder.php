<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
use App\Models\Area;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instructor::truncate();

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
            
        Instructor::factory(13)->create();
    }
}

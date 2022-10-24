<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Area;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'first_name' => 'Edeblangel',
            'first_lastname' => 'Vanegas',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role' => 'administrator',
        ])->create();

        User::factory([
            'first_name' => 'Elías',
            'first_lastname' => 'Vargas',
            'email' => 'teacher@example.com',
            'password' => bcrypt('teacher'),
            'role' => 'instructor',
        ])->create();

        User::factory([
            'first_name' => 'Esteban',
            'first_lastname' => 'Florez',
            'email' => 'student@example.com',
            'password' => bcrypt('student'),
            'role' => 'student',
        ])->create();

        Area::factory(4)->create();
        Area::create(['name' => 'Informática', 'is_pnf' => true, 'pnf_name' => 'Informática']);
    }
}

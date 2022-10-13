<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Edeblangel Vanegas',
            'email' => 'administrator@example.com',
            'password' => bcrypt('administrator'),
            'role' => 'administrator',
        ]);

        User::create([
            'name' => 'Elías Vargas',
            'email' => 'teacher@example.com',
            'password' => bcrypt('teacher'),
            'role' => 'instructor',
        ]);

        User::create([
            'name' => 'Esteban Florez',
            'email' => 'student@example.com',
            'password' => bcrypt('student'),
            'role' => 'student',
        ]);
    }
}

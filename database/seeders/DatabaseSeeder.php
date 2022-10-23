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
        User::create([
            'name' => 'Edeblangel Vanegas',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
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

        User::create([
            'name' => 'Esteban Florez',
            'email' => 'eflorez077@gmail.com',
            'password' => bcrypt('student'),
            'role' => 'student',
        ]);

        Area::factory(4)->create();
        Area::create(['name' => 'Informática', 'is_pnf' => true, 'pnf_name' => 'Informática']);
    }
}

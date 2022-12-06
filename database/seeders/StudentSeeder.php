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

        Student::create([
            'first_name' => 'Esteban',
            'second_name' => 'Andrés',
            'first_lastname' => 'Florez',
            'second_lastname' => 'Hernández',
            'ci' => 31342325,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04128970019',
            'address' => 'Calle 5 de marzo N°30-11, Santa Cruz de Aragua.',
            'email' => 'student@example.com',
            'password' => 'student',
            'grade' => 'high',
            'birth' => '2003-07-07',
            'is_upta' => true,
        ]);

        Student::create([
            'first_name' => 'Angélica',
            'second_name' => 'Fabiola',
            'first_lastname' => 'Abache',
            'second_lastname' => 'Adames',
            'ci' => 30081914,
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04163138572',
            'address' => 'Calle Mariño N°30-20, Cagua, Edo. Aragua.',
            'email' => 'angelica@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '2002-10-10',
            'is_upta' => true,
        ]);

        Student::create([
            'first_name' => 'Myriam',
            'second_name' => 'Mariednys',
            'first_lastname' => 'Yaqueno',
            'second_lastname' => 'Romero',
            'ci' => 30039202,
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04163138552',
            'address' => 'Calle de Los Cocos N°20-10, Cagua, Edo. Aragua.',
            'email' => 'myriam@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '2003-09-30',
            'is_upta' => true,
        ]);

        Student::create([
            'first_name' => 'Allan',
            'second_name' => 'Anderson',
            'first_lastname' => 'Gonzalez',
            'second_lastname' => 'Avila',
            'ci' => 30327381,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04123894213',
            'address' => 'Calle 5 de julio N°20-10, Santa Cruz de Aragua.',
            'email' => 'allan@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '2003-09-30',
            'is_upta' => true,
        ]);

        Student::create([
            'first_name' => 'Saul',
            'second_name' => 'Efrain',
            'first_lastname' => 'Florez',
            'second_lastname' => 'Hernandez',
            'ci' => 25607793,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04123478901',
            'address' => 'Calle 5 de marzo N°30-11, Santa Cruz de Aragua.',
            'email' => 'saul@example.com',
            'password' => 'password',
            'grade' => 'college',
            'birth' => '1996-03-02',
            'is_upta' => false,
        ]);

        Student::create([
            'first_name' => 'Gabriel',
            'second_name' => 'Mauricio',
            'first_lastname' => 'Florez',
            'second_lastname' => 'Hernandez',
            'ci' => 16436508,
            'ci_type' => 'E',
            'gender' => 'male',
            'phone' => '04243864343',
            'address' => 'Calle 5 de marzo N°30-11, Santa Cruz de Aragua.',
            'email' => 'mauro@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '1986-11-11',
            'is_upta' => false,
        ]);

        Student::create([
            'first_name' => 'Laura',
            'second_name' => 'Liseth',
            'first_lastname' => 'Florez',
            'second_lastname' => 'Hernandez',
            'ci' => 18232501,
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04243266043',
            'address' => 'Calle Páez N°30-11, Santa Cruz de Aragua.',
            'email' => 'laura@example.com',
            'password' => 'password',
            'grade' => 'tsu',
            'birth' => '1988-09-27',
            'is_upta' => false,
        ]);

        Student::create([
            'first_name' => 'Katherine',
            'second_name' => 'Andrea',
            'first_lastname' => 'Jiménez',
            'second_lastname' => 'Monsalve',
            'ci' => 31342324,
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04129329021',
            'address' => 'Urb. Corocito Calle 6, Santa Cruz de Aragua.',
            'email' => 'kathalt3@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '2004-07-06',
            'is_upta' => false,
        ]);

        Student::create([
            'first_name' => 'Lucas',
            'second_name' => 'Eduardo',
            'first_lastname' => 'García',
            'second_lastname' => 'Romero',
            'ci' => 30198312,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04129329032',
            'address' => 'Urb. Corocito Calle 6, Santa Cruz de Aragua.',
            'email' => 'lucas@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '2003-04-06',
            'is_upta' => false,
        ]);

        Student::create([
            'first_name' => 'Miguel',
            'second_name' => 'Alejandro',
            'first_lastname' => 'García',
            'second_lastname' => 'Romero',
            'ci' => 31902121,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04129322322',
            'address' => 'Urb. Corocito Calle 6, Santa Cruz de Aragua.',
            'email' => 'miguel@example.com',
            'password' => 'password',
            'grade' => 'tsu',
            'birth' => '2001-02-07',
            'is_upta' => false,
        ]);

        Student::create([
            'first_name' => 'Carlos',
            'second_name' => 'Alejandro',
            'first_lastname' => 'García',
            'second_lastname' => 'Romero',
            'ci' => 31469121,
            'ci_type' => 'E',
            'gender' => 'male',
            'phone' => '04168293829',
            'address' => 'Urb. Corocito Calle 6, Santa Cruz de Aragua.',
            'email' => 'carlos@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '2005-02-12',
            'is_upta' => true,
        ]);

        Student::create([
            'first_name' => 'Juan',
            'second_name' => 'Daniel',
            'first_lastname' => 'Castillo',
            'second_lastname' => 'Blanco',
            'ci' => 28019231,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04161523829',
            'address' => 'Urb. Corocito Calle 6, Santa Cruz de Aragua.',
            'email' => 'juan@example.com',
            'password' => 'password',
            'grade' => 'high',
            'birth' => '1999-03-12',
            'is_upta' => true,
        ]);
    }
}

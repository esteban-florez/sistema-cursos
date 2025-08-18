<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'first_name' => 'Mario',
            'first_lastname' => 'Villegas',
            'ci' => 86918520,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04158513236',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'admin@example.com',
            'password' => 'Admin20.',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-02-10',
            'area_id' => 1,
            'role' => 'Administrador',
        ]);

        User::create([
            'first_name' => 'Carlos',
            'first_lastname' => 'Ramírez',
            'ci' => 49059205,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04152921050',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'instructor@example.com',
            'password' => 'Teacher20.',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-02-10',
            'area_id' => 1,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Pablo',
            'first_lastname' => 'Fuentes',
            'ci' => 86938501,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04150291025',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'pablo@example.com',
            'password' => 'Password20.',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-05-11',
            'area_id' => 1,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Luisa',
            'first_lastname' => 'García',
            'ci' => 85885025,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04159571023',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'luisa@example.com',
            'password' => 'Password20.',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-03-23',
            'area_id' => 1,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Ricardo',
            'first_lastname' => 'Jimenez',
            'ci' => 60851919,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04152908312',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'ricardo@example.com',
            'password' => 'Password20.',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-02-10',
            'area_id' => 1,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Lucas',
            'first_lastname' => 'Diaz',
            'ci' => 78675912,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04152908312',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'lucas@example.com',
            'password' => 'Password20.',
            'degree' => 'Lic. en Administración',
            'birth' => '1990-01-12',
            'area_id' => 2,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Ramón',
            'first_lastname' => 'Rojas',
            'ci' => 95068241,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04152908312',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'ramon@example.com',
            'password' => 'Password20.',
            'degree' => 'Chef Profesional',
            'birth' => '1989-02-10',
            'area_id' => 3,
            'role' => 'Instructor',
        ]);


        User::create([
            'first_name' => 'Adelaida',
            'first_lastname' => 'Arias',
            'ci' => 75820391,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04152093102',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'adelaida@example.com',
            'password' => 'Password20.',
            'degree' => 'Asistente de Oficina',
            'birth' => '1989-02-10',
            'area_id' => 4,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Héctor',
            'first_lastname' => 'Valenzuela',
            'ci' => 60184024,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04152093102',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'hector@example.com',
            'password' => 'Password20.',
            'degree' => 'Ing. en Electrónica',
            'birth' => '1989-02-10',
            'area_id' => 5,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Mario',
            'first_lastname' => 'Lopez',
            'ci' => 89231235,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04152093102',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'mario@example.com',
            'password' => 'Password20.',
            'degree' => 'Lic. en Contaduría',
            'birth' => '1989-02-10',
            'area_id' => 6,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Daniela',
            'first_lastname' => 'Perez',
            'ci' => 75729482,
            'ci_type' => 'E',
            'gender' => 'Femenino',
            'phone' => '04152093102',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'daniela@example.com',
            'password' => 'Password20.',
            'degree' => 'Ing. en Mecánica',
            'birth' => '1989-02-10',
            'area_id' => 7,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Lisbeth',
            'first_lastname' => 'Ramirez',
            'ci' => 48592104,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04154683102',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'lisbeth@example.com',
            'password' => 'Password20.',
            'degree' => 'Lic. en Administración',
            'birth' => '1989-02-10',
            'area_id' => 8,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Dario',
            'first_lastname' => 'Marquez',
            'ci' => 85710214,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04158982010',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'dario@example.com',
            'password' => 'Password20.',
            'degree' => 'Ing. en Electricidad',
            'birth' => '1989-02-10',
            'area_id' => 9,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Maria',
            'first_lastname' => 'Díaz',
            'ci' => 65731834,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04152093102',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'maria@example.com',
            'password' => 'Password20.',
            'degree' => 'Lic. en Matemáticas',
            'birth' => '1989-02-10',
            'area_id' => 10,
            'role' => 'Instructor',
        ]);

        User::create([
            'first_name' => 'Esteban',
            'second_name' => 'Andrés',
            'first_lastname' => 'Florez',
            'second_lastname' => 'Hernández',
            'ci' => 89706848,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04154829104',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'student@example.com',
            'password' => 'Student20.',
            'grade' => 'Bachillerato',
            'birth' => '2003-07-07',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Mariana',
            'second_name' => 'Luisa',
            'first_lastname' => 'Hernandez',
            'second_lastname' => 'Nieves',
            'ci' => 67587021,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04153138572',
            'address' => 'Maracay, Edo. Aragua.',
            'email' => 'estudiante@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '2002-10-10',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Teresa',
            'second_name' => 'Mariednys',
            'first_lastname' => 'Romero',
            'second_lastname' => 'Nieves',
            'ci' => 98124057,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04153138552',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'teresa@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '2003-09-30',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Allan',
            'second_name' => 'Julio',
            'first_lastname' => 'Vazquez',
            'second_lastname' => 'Yano',
            'ci' => 49607980,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04153894213',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'julioallan@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '2003-09-30',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Yefferson',
            'second_name' => 'Efrain',
            'first_lastname' => 'Farias',
            'second_lastname' => 'Meneses',
            'ci' => 50682040,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04153478901',
            'address' => 'Santa Cruz, Edo. Aragua',
            'email' => 'yeff@example.com',
            'password' => 'Password20.',
            'grade' => 'Superior',
            'birth' => '1996-03-02',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Gabriel',
            'second_name' => 'Samuel',
            'first_lastname' => 'Arreaga',
            'second_lastname' => 'Lopez',
            'ci' => 69182420,
            'ci_type' => 'E',
            'gender' => 'Masculino',
            'phone' => '04153864343',
            'address' => 'Santa Cruz, Edo. Aragua',
            'email' => 'gabrielsamuel@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '1986-11-11',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Ana',
            'second_name' => 'Celia',
            'first_lastname' => 'Perez',
            'second_lastname' => 'Marquez',
            'ci' => 94720518,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04153266043',
            'address' => 'Santa Cruz, Edo. Aragua',
            'email' => 'anacelia@example.com',
            'password' => 'Password20.',
            'grade' => 'TSU',
            'birth' => '1988-09-27',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Carolina',
            'second_name' => 'Andrea',
            'first_lastname' => 'Reyes',
            'second_lastname' => 'Monsalve',
            'ci' => 58015820,
            'ci_type' => 'V',
            'gender' => 'Femenino',
            'phone' => '04159329021',
            'address' => 'Santa Cruz, Edo. Aragua',
            'email' => 'carolina@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '2004-07-06',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Liam',
            'second_name' => 'Eduardo',
            'first_lastname' => 'García',
            'second_lastname' => 'Romero',
            'ci' => 51960281,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04159329032',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'liam@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '2003-04-06',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Miguel',
            'second_name' => 'Alejandro',
            'first_lastname' => 'García',
            'second_lastname' => 'Romero',
            'ci' => 48205810,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04159322322',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'miguel@example.com',
            'password' => 'Password20.',
            'grade' => 'TSU',
            'birth' => '2001-02-07',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Carlos',
            'second_name' => 'Alejandro',
            'first_lastname' => 'García',
            'second_lastname' => 'Romero',
            'ci' => 75629519,
            'ci_type' => 'E',
            'gender' => 'Masculino',
            'phone' => '04158293829',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'carlos@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '2005-02-12',
            'role' => 'Estudiante',
        ]);

        User::create([
            'first_name' => 'Pedro',
            'second_name' => 'Daniel',
            'first_lastname' => 'Arias',
            'second_lastname' => 'Blanco',
            'ci' => 80592812,
            'ci_type' => 'V',
            'gender' => 'Masculino',
            'phone' => '04151523829',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'pedroarias@example.com',
            'password' => 'Password20.',
            'grade' => 'Bachillerato',
            'birth' => '1999-03-12',
            'role' => 'Estudiante',
        ]);
    }
}

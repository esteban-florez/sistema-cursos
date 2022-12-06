<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;

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

        Instructor::create([
            'name' => 'Edeblangel',
            'lastname' => 'Vanegas',
            'ci' => 14189212,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04248513236',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'degree' => 'Coordinador de Vinculación Social',
            'birth' => '1989-02-10',
            'is_admin' => true,
            'area_id' => 1,
        ]);
        
        Instructor::create([
            'name' => 'Elías',
            'lastname' => 'Vargas',
            'ci' => 10238923,
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04242921050',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'teacher@example.com',
            'password' => 'teacher',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-02-10',
            'area_id' => 1,
        ]);       
        
        Instructor::create([
            'name' => 'Jackson',
            'lastname' => 'Pérez',
            'ci' => 12930202, 
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04140291025',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'jackson@example.com',
            'password' => 'password',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-05-11',
            'area_id' => 1,
        ]);       

        Instructor::create([
            'name' => 'Ana',
            'lastname' => 'García',
            'ci' => 13242093, 
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04129571023',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'ana@example.com',
            'password' => 'password',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-03-23',
            'area_id' => 1,
        ]);       

        Instructor::create([
            'name' => 'Vicente',
            'lastname' => 'Sifuentes',
            'ci' => 20183921, 
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04122908312',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'vicente@example.com',
            'password' => 'password',
            'degree' => 'Ing. en Informática',
            'birth' => '1989-02-10',
            'area_id' => 1,
        ]);       

        Instructor::create([
            'name' => 'Lucas',
            'lastname' => 'Diaz',
            'ci' => 9348192, 
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04122908312',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'lucas@example.com',
            'password' => 'password',
            'degree' => 'Lic. en Administración',
            'birth' => '1990-01-12',
            'area_id' => 2,
        ]);       

        Instructor::create([
            'name' => 'Ramón',
            'lastname' => 'Rojas',
            'ci' => 14829923, 
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04122908312',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'ramon@example.com',
            'password' => 'password',
            'degree' => 'Chef Profesional',
            'birth' => '1989-02-10',
            'area_id' => 3,
        ]);       

        
        Instructor::create([
            'name' => 'Adelaida',
            'lastname' => 'Arias',
            'ci' => 23920122, 
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04122093102',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'adelaida@example.com',
            'password' => 'password',
            'degree' => 'Asistente de Oficina',
            'birth' => '1989-02-10',
            'area_id' => 4,
        ]);       

        Instructor::create([
            'name' => 'Héctor',
            'lastname' => 'Valenzuela',
            'ci' => 16732132, 
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04162093102',
            'address' => 'Cagua, Edo. Aragua',
            'email' => 'hector@example.com',
            'password' => 'password',
            'degree' => 'Ing. en Electrónica',
            'birth' => '1989-02-10',
            'area_id' => 5,
        ]);       

        Instructor::create([
            'name' => 'Mario',
            'lastname' => 'Lopez',
            'ci' => 8923123, 
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04162093102',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'mario@example.com',
            'password' => 'password',
            'degree' => 'Lic. en Contaduría',
            'birth' => '1989-02-10',
            'area_id' => 6,
        ]);       

        Instructor::create([
            'name' => 'Luisa',
            'lastname' => 'Perez',
            'ci' => 24898201, 
            'ci_type' => 'E',
            'gender' => 'female',
            'phone' => '04162093102',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'luisa@example.com',
            'password' => 'password',
            'degree' => 'Ing. en Mecánica',
            'birth' => '1989-02-10',
            'area_id' => 7,
        ]);       

        Instructor::create([
            'name' => 'Lisbeth',
            'lastname' => 'Ramirez',
            'ci' => 23102932, 
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04264683102',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'lisbeth@example.com',
            'password' => 'password',
            'degree' => 'Lic. en Administración',
            'birth' => '1989-02-10',
            'area_id' => 8,
        ]);       

        Instructor::create([
            'name' => 'Dario',
            'lastname' => 'Marquez',
            'ci' => 18492002, 
            'ci_type' => 'V',
            'gender' => 'male',
            'phone' => '04128982010',
            'address' => 'La Victoria, Edo. Aragua',
            'email' => 'dario@example.com',
            'password' => 'password',
            'degree' => 'Ing. en Electricidad',
            'birth' => '1989-02-10',
            'area_id' => 9,
        ]);       
        
        Instructor::create([
            'name' => 'Yainally',
            'lastname' => 'Arriechi',
            'ci' => 19032812, 
            'ci_type' => 'V',
            'gender' => 'female',
            'phone' => '04122093102',
            'address' => 'Maracay, Edo. Aragua',
            'email' => 'yai@example.com',
            'password' => 'password',
            'degree' => 'Lic. en Matemáticas',
            'birth' => '1989-02-10',
            'area_id' => 10,
        ]);

        Instructor::create([
            'name' => 'Kakashi',
            'lastname' => 'Hatake',
            'ci' => 77777777, 
            'ci_type' => 'E',
            'gender' => 'male',
            'phone' => '04127777777',
            'address' => 'Konohagakure',
            'email' => 'kakashi@konoha.com',
            'password' => 'konoha',
            'degree' => 'Jonin de Konoha',
            'birth' => '1989-02-10',
            'area_id' => 11,
        ]);
    }
}

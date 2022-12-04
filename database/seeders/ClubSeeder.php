<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::truncate();

        Club::factory([
            'name' => 'Futbol',
            'description' => 'El siguiente club es una entidad deportiva que tiene como fin único la práctica del fútbol. Aprende las bases y desarrolla tus habilidades en esta área.',
            'day' => 'mo',
            'start_hour' => '08:00:00',
            'end_hour' => '12:00:00',
            'image' => 'img/futbol.jpg',
            'instructor_id' => 2,
        ])->create();
        
        Club::factory([
            'name' => 'Voleibol',
            'description' => 'El siguiente club tiene como fin único la práctica del voleibol. Aprende las bases y desarrolla tus habilidades en esta área.',
            'day' => 'fr',
            'start_hour' => '08:00:00',
            'end_hour' => '12:00:00',
            'image' => 'img/voleibol.jpg',
            'instructor_id' => 2,
        ])->create();

        Club::factory([
            'name' => 'Baloncesto',
            'description' => 'El siguiente club tiene como fin único la práctica del baloncesto. Aprende las bases y desarrolla tus habilidades en esta área.',
            'day' => 'we',
            'start_hour' => '08:00:00',
            'end_hour' => '11:00:00',
            'image' => 'img/baloncesto.jpg',
            'instructor_id' => 4,
        ])->create();

        Club::factory([
            'name' => 'Beisbol',
            'description' => 'El siguiente club tiene como fin único la práctica del beisbol. Aprende las bases y desarrolla tus habilidades en esta área.',
            'day' => 'we',
            'start_hour' => '08:00:00',
            'end_hour' => '12:00:00',
            'image' => 'img/beisbol.jpg',
            'instructor_id' => 4,
        ])->create();

        Club::factory([
            'name' => 'Salsa',
            'description' => 'En este curso aprenderas a bailar salsa desde sus pasos básicos hasta movimientos que te harán todo un experto, únete y diviertete bailando.',
            'day' => 'th',
            'start_hour' => '10:00:00',
            'end_hour' => '12:00:00',
            'image' => 'img/salsa.jpg',
            'instructor_id' => 2,
        ])->create();
    }
}

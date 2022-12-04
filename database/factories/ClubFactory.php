<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $end_hour = $this->faker->time();
        $start_hour = $this->faker->time('H:i:s', $end_hour);

        return [
            'name' => implode(' ', $this->faker->words(2)),
            'description' => $this->faker->text(100),
            'image' => 'img/programacion.jpg',
            'day' => $this->faker->randomElement(['mo', 'tu', 'we', 'Th', 'fr', 'sa', 'su']),
            'start_hour' => $start_hour,
            'end_hour' => $end_hour,
            'instructor_id' => Instructor::all()->random()->id,
        ];
    }
}

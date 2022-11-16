<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $end_course = $this->faker->dateTimeThisMonth();
        $start_course = $this->faker->dateTimeThisMonth($end_course);
        $end_ins = $this->faker->dateTimeThisMonth($start_course);
        $start_ins = $this->faker->dateTimeThisMonth($end_ins);
        $end_time = $this->faker->time();
        $start_time = $this->faker->time('H:i:s', $end_time);
        // TODO -> start time a veces es mas tarde que end time xd

        return [
            'name' => $this->faker->words(2),
            'description' => $this->faker->paragraph(),
            'total_price' => $this->faker->randomElement([25, 30, 45, 50]),
            'price_ins' => $this->faker->randomElement([5, 10, 15]),
            'start_ins' => $start_ins,
            'end_ins' => $end_ins,
            'start_course' => $start_course,
            'end_course' => $end_course,
            'duration' => $this->faker->randomNumber(2, true),
            'student_limit' => $this->faker->randomElement([15, 20, 40, 50]),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'image' => 'img/programacion.jpg',
        ];
    }
}

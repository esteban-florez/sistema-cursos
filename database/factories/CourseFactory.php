<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => implode(' ', $this->faker->words(2)),
            'description' => $this->faker->text(200),
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
            'area_id' => Area::factory(),
            'instructor_id' => Instructor::factory(),
        ];
    }
}

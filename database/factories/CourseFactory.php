<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\User;
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
        $end_hour = $this->faker->time();
        $start_hour = $this->faker->time('H:i:s', $end_hour);
        // TODO -> start time a veces es mas tarde que end time xd

        return [
            'name' => implode(' ', $this->faker->words(2)),
            'description' => $this->faker->text(200),
            'total_price' => $this->faker->randomElement([25, 30, 45, 50]),
            'reserv_price' => $this->faker->randomElement([5, 8, 10]),
            'start_ins' => $start_ins,
            'end_ins' => $end_ins,
            'start_course' => $start_course,
            'end_course' => $end_course,
            'duration' => $this->faker->randomNumber(2, true),
            'student_limit' => $this->faker->randomElement([15, 20, 40, 50]),
            'start_hour' => $start_hour,
            'end_hour' => $end_hour,
            'days' => $this->faker->randomElements(days(), collect([1, 2, 3])->random()),
            'image' => 'img/programacion.jpg',
            'area_id' => Area::all()->random()->id,
            'user_id' => User::where('role', 'instructor')->get()->random()->id,
        ];
    }
}

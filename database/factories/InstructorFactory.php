<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'ci' => $this->faker->unique()->randomNumber(8, true),
            'ci_type' => $this->faker->randomElement(['V', 'E']),
            'image' => 'image.jpg',
            'gender' => $this->faker->randomElement(['male', 'female']),
            'phone' => rand(pow(10, 11-1), pow(10, 11)-1),
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->email,
            'password' => $this->faker->password(8),
            'degree' => $this->faker->jobTitle,
            'birth' => $this->faker->date,
            'area_id' => 1,
            'is_admin' => false,
        ];
    }
}

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
            'ci' => $this->faker->unique()->randomNumber(8),
            'ci_type' => $this->faker->randomElement(['V', 'E']),
            'image' => 'image.jpg',
            'gender' => $this->faker->randomElement(['M', 'F']),
            'phone' => $this->faker->phoneNumber,
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

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'second_name' => $this->faker->name,
            'first_lastname' => $this->faker->lastName,
            'second_lastname' => $this->faker->lastName,
            'ci' => $this->faker->unique()->randomNumber(8),
            'ci_type' => $this->faker->randomElement(['V', 'E']),
            'image' => 'image.jpg',
            'gender' => $this->faker->randomElement(['M', 'F']),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->email,
            'password' => $this->faker->password(8),
            'grade' => $this->faker->randomElement(['school', 'high', 'tsu', 'college']),
            'birth' => $this->faker->date,
            'is_upta' => $this->faker->boolean,
        ];
    }
}

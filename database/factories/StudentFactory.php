<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->firstName,
            'first_lastname' => $this->faker->lastName,
            'second_lastname' => $this->faker->lastName,
            'ci' => $this->faker->randomNumber(8, true),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth' => $this->faker->date(),
            'phone' => rand(pow(10, 11-1), pow(10, 11)-1),
            'address' => $this->faker->address,
            'grade' => $this->faker->randomElement(['school', 'high', 'tsu', 'college']),
            'is_upta' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

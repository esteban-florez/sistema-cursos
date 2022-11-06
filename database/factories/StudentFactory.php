<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
>>>>>>> ca6c051d25f8dcb31f4e877873c6f9a40fbca815

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
<<<<<<< HEAD
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->firstName,
            'first_lastname' => $this->faker->lastName,
            'second_lastname' => $this->faker->lastName,
            'ci' => $this->faker->randomNumber(8, true),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'grade' => $this->faker->randomElement(['basic', 'middle', 'tsu', 'pregrade']),
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
=======
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
>>>>>>> ca6c051d25f8dcb31f4e877873c6f9a40fbca815
}

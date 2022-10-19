<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->jobTitle,
            'is_pnf' => $this->faker->boolean(),
            'pnf_name' => $this->faker->unique()->company,
        ];
    }
}

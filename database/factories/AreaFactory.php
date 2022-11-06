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
        $is_pnf = $this->faker->boolean();

        return [
            'name' => $this->faker->unique()->company,
            'is_pnf' => $is_pnf,
            'pnf_name' => $is_pnf ? $this->faker->unique()->jobTitle : null,
        ];
    }
}

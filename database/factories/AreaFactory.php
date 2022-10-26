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
        $isPnf = $this->faker->boolean();

        return [
            'name' => $this->faker->unique()->jobTitle,
            'is_pnf' => $isPnf,
            'pnf_name' => $isPnf ? $this->faker->unique()->company : null,
        ];
    }
}

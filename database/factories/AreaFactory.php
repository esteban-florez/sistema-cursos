<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PNF;

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
            'pnf_id' => PNF::all()->random()->id,
        ];
    }
}

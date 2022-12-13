<?php

namespace Database\Factories;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if($this->faker->boolean()) {
            $ref = $this->faker->randomNumber(4, true);
            $type = $this->faker->randomElement(payTypes()->take(2));
        } else {
            $ref = null;
            $type = $this->faker->randomElement(payTypes()->reverse()->take(2));
        }

        return [
            'date' => now()->format('Y-m-d'),
            'ref' => $ref,
            'type' => $type,
            'amount' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}

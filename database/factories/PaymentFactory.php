<?php

namespace Database\Factories;

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
        $type = payTypes()->random();

        $ref = match ($type) {
            'Pago Móvil' => randomNumericString(4),
            'Transferencia' => randomNumericString(10),
            default => null
        };
        
        return [
            'ref' => $ref,
            'type' => $type,
            'amount' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}

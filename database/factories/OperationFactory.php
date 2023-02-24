<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amounts = collect([20, 15, 10, 5, 3, 1]);
        $type = operationTypes()->random();

        return [
            'amount' => $amounts->random(),
            'type' => $type,
            'reason' => $type === 'Ingreso' ? null : 'Desgaste por uso', 
            'item_id' => Item::all()->random()->id,
        ];
    }
}

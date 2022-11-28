<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Registry;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::truncate();

        for ($i = 1; $i <= Registry::count(); $i++) { 
            Payment::factory([
                'registry_id' => $i,
            ])->create();
        }
    }
}

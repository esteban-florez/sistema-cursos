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
    public static function run()
    {
        Payment::truncate();
        
        Registry::all()
        ->each(function ($registry) {
                $type = collect(['movil', 'transfer', 'dollars', 'bs'])->random();
                $amount = null;
                $ref = null;

                if ($type === 'dollars' || $type === 'bs') {
                    $ref = null;
                    $amount = $registry->course->total_price;
                } else {
                    $amount = $registry->course->total_price * 13.2;
                    if($type === 'movil') {
                        $ref = rand(pow(10, 3), pow(10, 4) - 1);
                    } else {
                        $ref = rand(pow(10, 7), pow(10, 8) - 1);
                    }
                }

                Payment::create([
                    'type' => $type,
                    'amount' => $amount,
                    'ref' => $ref,
                    'registry_id' => $registry->id,
                ]);
            });
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Inscription;


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
        
        Inscription::all()
        ->each(function ($inscription) {
                $type = payTypes()->random();
                $amount = null;
                $ref = null;

                if ($type === 'Efectivo ($)' || $type === 'Efectivo (Bs.D.)') {
                } else {
                    if($type === 'Pago Móvil') {
                        $ref = rand(pow(10, 3), pow(10, 4) - 1);
                    } else {
                        $ref = rand(pow(10, 7), pow(10, 8) - 1);
                    }
                }
                
                if ($type !== 'Efectivo ($)') {
                    $amount = $inscription->course->total_price * 14.65;
                } else {
                    $amount = $inscription->course->total_price;
                }
                
                Payment::create([
                    'type' => $type,
                    'amount' => $amount,
                    'ref' => $ref,
                    'inscription_id' => $inscription->id,
                ]);
            });
    }
}

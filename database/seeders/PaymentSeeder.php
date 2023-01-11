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
            $payment = Payment::factory([
                'inscription_id' => $inscription->id
            ])->make();

            if ($payment->type !== 'Efectivo ($)') {
                $payment->amount = $inscription->course->total_price * 18.65;
            } else {
                $payment->amount = $inscription->course->total_price;
            }

            $payment->save();
        });
    }
}

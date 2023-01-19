<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Enrollment;

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
        
        Enrollment::all()
            ->each(function ($enrollment) {
                $payment = Payment::factory([
                    'enrollment_id' => $enrollment->id
                ])->make();

                if ($payment->type !== 'Efectivo ($)') {
                    $payment->amount = $enrollment->course->total_price * 18.65;
                } else {
                    $payment->amount = $enrollment->course->total_price;
                }

                $payment->save();
            });
    }
}

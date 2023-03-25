<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Services\ExchangeRate;

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
                if ($enrollment->mode === 'Un solo pago') {
                    $payment = $this->createPayment($enrollment, 'Pago completo');
                    $payment->save();
                    return;
                }
                
                $payment = $this->createPayment($enrollment, 'Reservación');
                $payment->save();
                
                $payment = $this->createPayment($enrollment, 'Cuota restante');
                $payment->save();
            });
    }

    private function createPayment($enrollment, $category)
    {
        $course = $enrollment->course;

        if ($category === 'Cuota restante') {
            return Payment::make([
                'enrollment_id' => $enrollment->id,
                'category' => $category,
                'fulfilled' => false,
            ]);
        }

        $payment = Payment::factory([
            'enrollment_id' => $enrollment->id,
            'category' => $category,
        ])->make();

        $basePrices = [
            'Cuota restante' => $course->total_price - $course->reserv_price,
            'Pago completo' => $course->total_price,
            'Reservación' => $course->reserv_price,
        ];

        if ($payment->type !== 'Efectivo ($)') {
            $payment->amount = $basePrices[$category];
        } else {
            $payment->amount = $basePrices[$category] / ExchangeRate::get();
        }

        return $payment;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\User;
use App\Services\ExchangeRate;

class PaymentSeeder extends Seeder
{
    private $rate;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rate = ExchangeRate::get();

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

        $this->confirmPayments();
    }

    protected function confirmPayments()
    {
        $user = User::find(16);
        $course = Course::find(7);

        $payments = Payment::withoutGlobalScope('fulfilled')
            ->whereHas('enrollment', function ($query) use ($user, $course) {
                $query->where('enrollments.user_id', $user->id)
                    ->orWhere('enrollments.course_id', $course->id);
            })->get();

        $payments->each(function ($payment) {
            if ($payment->category !== 'Cuota restante') {
                $payment->update([
                    'status' => 'Confirmado',
                ]);
                return;
            }

            $course = $payment->enrollment->course;

            $payment->update([
                'amount' => $course->total_price - $course->reserv_price,
                'type' => 'Efectivo (Bs.D.)',
                'fulfilled' => true,
                'status' => 'Confirmado',
            ]);
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
            $payment->amount = $basePrices[$category] / $this->rate;
        }

        return $payment;
    }
}

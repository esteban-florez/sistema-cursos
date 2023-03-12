<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\PaymentNotification;
use App\Notifications\PaymentStatusNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class PaymentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->type === 'created') {
            $this->paymentCreated($event->payment);
        }
        if ($event->type === 'updated-status') {
            $this->paymentUpdatedStatus($event->payment);
        }
    }

    protected function paymentCreated($payment)
    {
        $user = User::where('role', 'Administrador')->first();
        
        Notification::send($user, new PaymentNotification($payment));
    }

    protected function paymentUpdatedStatus($payment)
    {
        if ($payment->status === 'Pendiente') {
            return;
        }

        Notification::send($payment->enrollment->student, new PaymentStatusNotification($payment));
    }
}

<?php

namespace App\Listeners;

use App\Notifications\LoanNotification;
use Illuminate\Support\Facades\Notification;

class LoanListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send($event->loan->club->instructor, new LoanNotification($event->loan));
    }
}

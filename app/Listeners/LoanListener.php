<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\LoanNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $user = User::findOrFail($event->loan->club->instructor->id);
        
        Notification::send($user, new LoanNotification($event->loan));
    }
}

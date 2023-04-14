<?php

namespace App\Listeners;

use App\Notifications\CourseNotification;
use Illuminate\Support\Facades\Notification;

class CourseListener
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
        Notification::send($event->course->instructor, new CourseNotification($event->course));
    }
}

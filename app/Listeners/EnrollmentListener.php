<?php

namespace App\Listeners;

use App\Notifications\CertificateNotification;
use App\Notifications\EnrollmentNotification;
use Illuminate\Support\Facades\Notification;

class EnrollmentListener
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
        Notification::send($event->enrollment->student, new EnrollmentNotification($event->enrollment));
        
        if ($event->enrollment->canDownloadCertificate()) {
            Notification::send($event->enrollment->student, new CertificateNotification($event->enrollment));
        }
    }
}

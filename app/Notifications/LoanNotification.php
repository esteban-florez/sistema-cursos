<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanNotification extends Notification
{
    use Queueable;

    public $loan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($loan)
    {
        $this->loan = $loan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $status = strtolower($this->loan->status);

        return [
            'url' => route('clubs.loans.index', ['club' => $this->loan->club]),
            'icon' => 'hand-holding',
            'title' => "Artículo $status",
            'id' => $this->loan->id,
            'name' => $this->loan->item->name,
            'time' => now()->diffForHumans(),
        ];
    }
}

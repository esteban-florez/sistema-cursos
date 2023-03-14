<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClubEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $club;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($club)
    {
        $this->club = $club;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

<?php

namespace App\Events;

use App\Models\Attachee;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AttacheeDismissed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $attachee;
    public $message;
    public $reason;
    /**
     * Create a new event instance.
     */
    public function __construct(Attachee $attachee, $message, $reason)
    {
        $this->attachee = $attachee;
        $this->message = $message;
        $this->reason = $reason;
    }

/**
 * Get the channels the event should broadcast on.
 *
 * @return array<int, \Illuminate\Broadcasting\Channel>
 */
// public function broadcastOn(): array
// {
//     return [
//         new PrivateChannel('channel-name'),
//     ];
// }
}
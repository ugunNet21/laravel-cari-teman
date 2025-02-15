<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast {
    use InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message) {
        $this->message = $message;
    }

    public function broadcastOn(): array {
        return [new PrivateChannel('chat.' . $this->message->match_id)];
    }

    public function broadcastAs() {
        return 'message.sent';
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OutUserRoom implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $room_id;
    public $user_id;

    public function __construct($user_id,$room_id)
    {
        $this->room_id = $room_id;
        $this->user_id = $user_id;
    }

    public function broadcastOn(): Channel
    {
     
        return new Channel('room.' . $this->room_id);
  
    }
   
    public function broadcastAs(): string
    {
        return 'userOutRoom';
    }
}

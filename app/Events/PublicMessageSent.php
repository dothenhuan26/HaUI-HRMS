<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\User\Models\User;

class PublicMessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $user;
    public $message;

    public function __construct(User $user, $message)
    {
        //
        $this->user = $user;
        $this->message = $message;
    }


    public function broadcastOn()
    {
        return new PresenceChannel('public-chat');
    }

    public function broadcastWith()
    {
        return [
            "message" => $this->message,
            //            "user" => $this->user->only(['id', 'name']),
            "user"    => [
                "id"     => $this->user->id,
                "name"   => $this->user->name,
                "avatar" => $this->user->avatar?->url ?? asset("assets/img/user.jpg")
            ],
        ];
    }
}

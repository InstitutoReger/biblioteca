<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RenovacaoEvent {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $data;
    public $emprestimo;

    public function __construct($user, $data, $emprestimo) {
        $this -> user       = $user;
        $this -> data       = $data;
        $this -> emprestimo = $emprestimo;
    }

    public function broadcastOn() {
        return new PrivateChannel('channel-name');
    }
}

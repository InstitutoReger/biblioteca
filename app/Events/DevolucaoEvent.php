<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DevolucaoEvent {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nome;
    public $email;
    public $emprestimo;

    public function __construct($nome, $email, $emprestimo) {
        $this -> nome       = $nome;
        $this -> email      = $email;
        $this -> emprestimo = $emprestimo;
    }

    public function broadcastOn() {
        return new PrivateChannel('channel-name');
    }
}

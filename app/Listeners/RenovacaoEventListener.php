<?php

namespace App\Listeners;

use App\Events\RenovacaoEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacaoDeRenovacao;


class RenovacaoEventListener {
   
    public function __construct() {
        
    }

    public function handle(RenovacaoEvent $event) {
        $tempo = now() -> addMinutes(1);
        Mail::to($event -> user['email']) -> later($tempo, new ConfirmacaoDeRenovacao($event -> user['name'], $event -> data, $event -> emprestimo));
    }
}

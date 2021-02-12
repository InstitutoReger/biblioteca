<?php

namespace App\Listeners;

use App\Events\DevolucaoEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacaoDeDevolucao;

class DevolucaoEventListener {
    public function __construct() {
        
    }

    public function handle(DevolucaoEvent $event) {
        $tempo = now() -> addMinutes(1);
        Mail::to($event -> email) -> later($tempo ,new ConfirmacaoDeDevolucao($event -> nome, $event -> emprestimo));
    }
}

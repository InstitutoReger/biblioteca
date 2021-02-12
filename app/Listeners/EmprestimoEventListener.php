<?php

namespace App\Listeners;

use App\Events\EmprestimoEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacaoDeEmprestimo;

class EmprestimoEventListener {
    public function __construct() {
    
    }

    public function handle(EmprestimoEvent $event) {
        $tempo = now() -> addMinutes(1);
        Mail::to($event -> email) -> later($tempo, new ConfirmacaoDeEmprestimo($event -> dados));
    }
}

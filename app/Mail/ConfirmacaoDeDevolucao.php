<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacaoDeDevolucao extends Mailable
{
    use Queueable, SerializesModels;

    protected $nome;
    protected $emprestimo;

    public function __construct($nome, $emprestimo) {
        $this -> nome       = $nome;
        $this -> emprestimo = $emprestimo;
    }

    public function build() {
        return $this->view('emails.devolucao-de-emprestimo') -> with([
            'nome'       => $this -> nome,
            'emprestimo' => $this -> emprestimo
        ]);
    }
}

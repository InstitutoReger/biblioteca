<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacaoDeRenovacao extends Mailable
{
    use Queueable, SerializesModels;

    protected $nome;
    protected $data;
    protected $emprestimo;

    public function __construct($nome, $data, $emprestimo) {
        $this -> nome       = $nome;
        $this -> data       = $data;
        $this -> emprestimo = $emprestimo;
    }

    public function build() {
        return $this->view('emails.renovacao-de-emprestimo') -> with([
            'nome'       => $this -> nome,
            'data'       => $this -> data,
            'emprestimo' => $this -> emprestimo
        ]);
    }
}
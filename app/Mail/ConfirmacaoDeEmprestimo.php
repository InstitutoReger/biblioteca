<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
Use App\User;

class ConfirmacaoDeEmprestimo extends Mailable {
    use Queueable, SerializesModels;

    protected $dados;
    protected $retirada;
    protected $data_retirada;
    protected $devolucao;
    protected $data_devolucao;

    public function __construct($dados) {
        $this -> dados = $dados;
        $this -> retirada  = explode(' ', $this -> dados['data_emprestimo']);
        $this -> devolucao = explode(' ', $this -> dados['data_devolucao']);
        $this -> data_retirada = explode('/', $this -> devolucao[1]);
        $this -> data_devolucao = explode('/', $this -> retirada[1]);
    }

    public function build() {
        return $this->view('emails.confirmacao-de-emprestimo') -> with([
            'nome'            => $this -> dados['name'],
            'nome_autor'      => $this -> dados['nome_autor'],
            'sobrenome_autor' => $this -> dados['sobrenome_autor'],
            'titulo'          => $this -> dados['titulo'],
            'data_emprestimo' => $this -> retirada[0] . ', dia ' . $this -> data_retirada[2] . '/' . $this -> data_retirada[1] . $this -> data_retirada[0] . ' às ' . $this -> retirada[2],
            'data_devolucao'  => $this -> devolucao[0] . ', dia ' . $this -> data_devolucao[2] . '/' . $this -> data_devolucao[1] . $this -> data_devolucao[0] . ' às ' . $this -> devolucao[2]
        ]);
    }
}

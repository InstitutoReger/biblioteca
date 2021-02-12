<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\EmprestimoEvent;
use App\Events\DevolucaoEvent;
use App\Events\RenovacaoEvent;
use App\User;
use App\Obra;
use App\Emprestimo;
use App\Historico;
use PhpParser\Node\Stmt\Use_;

class ServicosControlador extends Controller {
    public function __construct() {
        $this -> middleware('auth:admin' OR 'auth:bb' OR 'auth');
    }

    public function index() {
        return view('servicos');
    }

    public function buscarAluno($cpf) {
        $aluno = User::where('cpf', $cpf) -> get();
        if(isset($aluno)) {
            return json_encode($aluno);
        }
        else {
            return 0;
        }     
    }

    public function buscarObra($cod) {
        $obra = Obra::with('autor') -> where('codigo', $cod) -> get();
        if(isset($obra)) {
            return json_encode($obra);
        }
        else {
            return 0;
        }     
    }

    public function store(Request $request) {
        $emprestimos = Emprestimo::all();
        $count       = $emprestimos -> count();
        $emprestimo  = new Emprestimo();

        $aluno = User::where('cpf', $request -> cpf) -> get();
        $obra  = Obra::with('autor')->where('codigo', $request -> cod) -> get();

        $aux = Emprestimo::where('user_id', $aluno[0] -> id) -> where('obra_id', $obra[0] -> id) -> count();

        if($aux == 0) {
            $data = date('Y/m/d');
            $hora = date('H:i:s');
            $data_emprestimo = $data . ' ' . $hora;
    
            $data_devolucao = date('Y/m/d', strtotime('+3 days', strtotime($data)));
    
            $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');
            $dia_semana_numero = date('w', strtotime($data_devolucao));
    
            if($dia_semana_numero == 0) {
                $data_devolucao = date('Y/m/d', strtotime('+1 days', strtotime($data_devolucao)));
            }
            if($dia_semana_numero == 6) {
                $data_devolucao = date('Y/m/d', strtotime('+2 days', strtotime($data_devolucao)));
            }
    
            $data_devolucao = $data_devolucao . ' ' . $hora;
    
            if($obra[0] -> estoque > 0) {
                $emprestimo -> id = $count + 1;
                $emprestimo -> obra_id = $obra[0]  -> id;
                $emprestimo -> user_id = $aluno[0] -> id;
                $emprestimo -> data_emprestimo = $data_emprestimo;
                $emprestimo -> data_devolucao  = $data_devolucao;
                $emprestimo -> save();
    
                $dados = [
                    'name'            => $aluno[0] -> name,
                    'nome_autor'      => $obra[0]  -> autor -> name,
                    'sobrenome_autor' => $obra[0]  -> autor -> lastname,
                    'titulo'          => $obra[0]  -> titulo,
                    'data_emprestimo' => $diasemana[date('w', strtotime($data_emprestimo))] . ' ' . $data_emprestimo,
                    'data_devolucao'  => $diasemana[date('w', strtotime($data_devolucao))] . ' ' . $data_devolucao 
                ];
    
                $obra[0] -> estoque = $obra[0] -> estoque - 1;
                $obra[0] -> save();
    
                event(new EmprestimoEvent($aluno[0] -> email, $dados));
                return json_encode($dados);
            }
            else {
                return 0;
            } 
        }
        else {
            return -1;
        }        
    }

    public function buscarNomeAluno($id) {
        $aluno = User::find($id);
        if(isset($aluno)) {
            return json_encode($aluno);
        }    
        return response('aluno não encontrado', 404);    
    }

    public function buscarNomeObra($id) {
        $obra = Obra::with('autor') -> where('id',$id) -> get();
        if(isset($obra)) {
            return json_encode($obra);
        }    
        return response('obra não encontrado', 404);
    }

    public function buscarEmprestimos($cpf) {
        $emprestimos = User::with('obras') -> where('cpf', $cpf) -> get();

        if(isset($emprestimos)) {
            return json_encode($emprestimos);
        }
        else {
            return 0;
        }
    }

    public function renovarEmprestimo($aluno, $obra) {
        $emprestimo = Emprestimo::where('user_id', $aluno)->where('obra_id', $obra)->get();

        $data_devolucao = $emprestimo[0] -> data_devolucao;

        $data_str = explode(' ', $data_devolucao);

        $data_devolucao = date('Y/m/d', strtotime('+3 days', strtotime($data_str[0])));

        $dia_semana_numero = date('w', strtotime($data_devolucao));
        if($dia_semana_numero == 0) {
            $data_devolucao = date('Y/m/d', strtotime('+1 days', strtotime($data_devolucao)));
        }
        if($dia_semana_numero == 6) {
            $data_devolucao = date('Y/m/d', strtotime('+2 days', strtotime($data_devolucao)));
        }

        $hora  = date('H:i:s');

        $emprestimo[0] -> data_devolucao = $data_devolucao . ' ' . $hora;
        $emprestimo[0] -> save();
     
        $dados = [
            "titulo" => Obra::where('id', $emprestimo[0] -> obra_id) -> value("titulo"),
            "data_devolucao" => Emprestimo::where('user_id', $aluno)->where('obra_id', $obra)->value("data_devolucao")
        ];

        $user = User::find($aluno);

        event(new RenovacaoEvent($user, $dados['data_devolucao'], $emprestimo[0] -> id));
        return json_encode($dados);        
    }

    public function devolverEmprestimo($aluno, $obra) {
        $historico  = new Historico();
        $emprestimo = Emprestimo::where('user_id', $aluno)->where('obra_id', $obra)->get();
        $emprestimo = $emprestimo[0];

        $historico -> user_id         = $emprestimo -> user_id;
        $historico -> obra_id         = $emprestimo -> obra_id;
        $historico -> data_emprestimo = $emprestimo -> data_emprestimo;
        $historico -> data_devolucao  = now();
        $historico -> save();

        $obra = Obra::where('id', $emprestimo -> obra_id) -> get();
        $obra = $obra[0];
        $obra -> estoque = $obra -> estoque + 1;
        $titulo = $obra -> titulo;
        $obra -> save();

        $user = User::find($aluno);
        
        event(new DevolucaoEvent($user -> name, $user -> email, $historico -> id));

        $emprestimo -> delete();
        return json_encode($titulo);        
    }
}

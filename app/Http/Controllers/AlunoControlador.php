<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historico;
use App\Obra;
use App\User;
use App\Reserva;

class AlunoControlador extends Controller {
    public function getHistorico($id) {
        $historico = Historico::with('user') -> with('obra') -> where('user_id', $id) -> get();
        return json_encode($historico);
    }

    public function abrirObra($id) {
        $obra = Obra::with('autor') -> where('id', $id) -> get();

        if(isset($obra)) {
            return json_decode($obra);
        }
    }

    public function reservarObra(Request $request) {
        $count = Reserva::where('user_id', $request -> input('user_id')) -> where('obra_id', $request -> input('obra_id')) -> count();

        if($count == 0) {
            $reserva = new Reserva();
            $data = date('Y/m/d');
            $hora = date('H:i:s');
            $data = date('Y/m/d', strtotime('+1 days', strtotime($data)));
            $validade = $data . ' ' . $hora;
    
            $reserva -> user_id  = $request -> input('user_id');
            $reserva -> obra_id  = $request -> input('obra_id');
            $reserva -> validade = $validade;
            $reserva -> save();
    
            return $reserva -> validade;
        }
        else {
            return 0;
        }
        
    }
}
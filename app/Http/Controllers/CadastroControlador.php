<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class CadastroControlador extends Controller {

    public function __construct() {
        $this -> middleware('auth:admin' OR 'auth:bb');
    }
    
    public function indexView() {
        return view('cadastro-geral');
    }

    public function index() {
        $autor = Autor::all();
        return $autor -> toJson();
    }

    public function store(Request $request) {
        $autor = new Autor();

        $autor -> name = $request -> input('nome');
        $autor -> lastname  = $request -> input('sobrenome');
        $autor -> save();

        return json_encode($autor);
    }

    public function show($id) {
        $autor = Autor::find($id);
        if(isset($autor)) {
            return json_encode($autor);
        }
        return response('Autor não encontrado', 404);
    }

    public function update(Request $request, $id) {     
        $autor = Autor::find($id);
        if(isset($autor)) {
            $autor -> name = $request -> input('nome');
            $autor -> lastname = $request -> input('sobrenome');
            $autor -> save();
            return json_encode($autor);
        }
        return response('Usuário não encontrado', 404);        
    }

    public function destroy($id) {
        $autor = Autor::find($id);
        if(isset($autor)) {
            $autor -> delete();
            return response('OK', 200);
        }
        return response('Autor não encontrada', 404);
    }
 }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obra;
use Illuminate\Support\Facades\Storage;

class ObraControlador extends Controller {

    public function __construct() {
        $this -> middleware('auth:admin' OR 'auth:bb' OR 'auth');
    }
        
    public function indexView() {
        return view('obras');
    }

    public function index() {
        $obras = Obra::with('autor')->get();
        return $obras -> toJson();
    }

    public function create() {
        
    }

    public function store(Request $request) {        
        $count = Obra::where('codigo', $request -> input('codigo')) -> count();        

        if($count == 0) {
            $obra = new Obra();
            $arquivo = $request -> file('arquivo');
                
            if(isset($arquivo)) {
                $path = $request -> file('arquivo') -> store('imagens', 'public');
            }
            
            $obra -> codigo          = $request -> input('codigo');
            $obra -> titulo          = $request -> input('titulo');
            $obra -> edicao          = $request -> input('edicao');
            $obra -> autor_id        = $request -> input('autor');
            $obra -> data_publicacao = $request -> input('data');
            $obra -> editora         = $request -> input('editora');
            $obra -> estoque         = $request -> input('estoque');
            $obra -> arquivo         = $path;
            $obra -> save();  

            $obra = $obra::with('autor') -> get();
            return json_encode($obra);
        }
        else {
            return 0;
        }        
    }

    public function show($id) {
        $obra = Obra::with('autor') -> where('id', $id) -> get();
        
        if(isset($obra)) {
            return json_encode($obra[0]);
        }
        return response('Usuário não encontrado', 404);
    }

    public function edit($id) {
        
    }

    public function update(Request $request, $id) {
        $obra  = Obra::find($id);
        $count = Obra::where('codigo', $request -> input('editar-codigo')) -> where('codigo', '<>', $obra -> codigo) -> count();

        if($count == 0) {
            if(isset($obra)) {
                $arquivo = $request -> file('editar-arquivo');
                if(isset($arquivo)) {
                    $path = $request -> file('editar-arquivo') -> store('imagens', 'public');
                    $arquivo = $obra -> arquivo;
                    Storage::disk('public') -> delete($arquivo);
                    $obra -> arquivo = $path;
                }
                
                $obra -> codigo          = $request -> input('editar-codigo');
                $obra -> titulo          = $request -> input('editar-titulo');
                $obra -> edicao          = $request -> input('editar-edicao');
                $obra -> autor_id        = $request -> input('editar-autor');
                $obra -> data_publicacao = $request -> input('editar-data');
                $obra -> editora         = $request -> input('editar-editora');
                $obra -> estoque         = $request -> input('editar-estoque');                
                $obra -> save();

                return json_encode($obra->with('autor') -> where('id', $id) -> get());
            }
            return response('Obra não encontrada', 404);
        }
        else {
            return 0;
        }
    }

    public function destroy($id) {
        $obra = Obra::find($id);
        if(isset($obra)) {
            $arquivo = $obra -> arquivo;
            Storage::disk('public') -> delete($arquivo);
            $obra -> delete();
            return response('OK', 200);
        }
        return response('Obra não encontrada', 404);
    }
}

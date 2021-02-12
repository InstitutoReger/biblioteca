<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Biblioteca;

class UsuarioControlador extends Controller {

    public function __construct() {
        $this -> middleware('auth:admin' OR 'auth:bb');
    }

    public function indexView() {
        return view('usuarios');
    }

    public function index() {
        $users = User::all();
        return $users -> toJson();
    }

    public function indexAdmin() {
        $admins = Admin::all();
        return $admins -> toJson();
    }

    public function indexBiblioteca() {
        $bibliotecas = Biblioteca::all();
        return $bibliotecas -> toJson();
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $user         = new User;
        $admin        = new Admin;
        $biblioteca   = new Biblioteca;        
        $perfil       = $request -> input('perfil');
        $count_cpf    = User::where('cpf', $request -> input('cpf')) -> count();
        $count_cpf   += Biblioteca::where('cpf', $request -> input('cpf')) -> count();
        $count_cpf   += Admin::where('cpf', $request -> input('cpf')) -> count();
        $count_email  = User::where('email', $request -> input('email')) -> count();
        $count_email += Biblioteca::where('email', $request -> input('email')) -> count();
        $count_email += Admin::where('email', $request -> input('email')) -> count();

        if($count_cpf == 0) {
            if($count_email == 0) {
                if($perfil == 1) {
                    $admin -> name      = $request -> input('nome');
                    $admin -> cpf       = $request -> input('cpf');
                    $admin -> email     = $request -> input('email');
                    $admin -> password  = bcrypt($request -> input('senha'));
                    $admin -> perfil_id = $perfil;
                    $admin -> save();
                    return json_encode($admin);
                }
                else if($perfil == 2) {
                    $user -> name      = $request -> input('nome');
                    $user -> cpf       = $request -> input('cpf');
                    $user -> email     = $request -> input('email');
                    $user -> password  = bcrypt($request -> input('senha'));
                    $user -> perfil_id = $perfil;
                    $user -> save();
                    return json_encode($user);
                }
                else {
                    $biblioteca -> name      = $request -> input('nome');
                    $biblioteca -> cpf       = $request -> input('cpf');
                    $biblioteca -> email     = $request -> input('email');
                    $biblioteca -> password  = bcrypt($request -> input('senha'));
                    $biblioteca -> perfil_id = $perfil;
                    $biblioteca -> save();
                    return json_encode($biblioteca);
                }
            }
            else {
                return -1;
            }
        }
        else {
            return 0;
        }        
    }

    public function show($perfil, $id) {
        if($perfil == 1) {
            $admin = Admin::find($id);
            if(isset($admin)) {
                return json_encode($admin);
            }
            return response('Usuário não encontrado', 404);
        }
        else if($perfil == 2) {
            $user = User::find($id);
            if(isset($user)) {
                return json_encode($user);
            }
            return response('Usuário não encontrado', 404);
        }
        else if($perfil == 3) {
            $biblioteca = Biblioteca::find($id);
            if(isset($biblioteca)) {
                return json_encode($biblioteca);
            }
            return response('Usuário não encontrado', 404);
        }
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $perfil, $id) {        
        $count_cpf    = User::where('cpf', $request -> input('cpf')) -> count();
        $count_cpf   += Biblioteca::where('cpf', $request -> input('cpf')) -> count();
        $count_cpf   += Admin::where('cpf', $request -> input('cpf')) -> count();
        $count_email  = User::where('email', $request -> input('email')) -> count();
        $count_email += Biblioteca::where('email', $request -> input('email')) -> count();
        $count_email += Admin::where('email', $request -> input('email')) -> count();

        if($perfil == 1) {
            $admin = Admin::find($id);
            if(asset($admin)) {
                if($request -> input('cpf') == $admin -> cpf) {
                    $count_cpf = 0;
                }

                if($request -> input('email') == $admin -> email) {
                    $count_email = 0;
                }
            }            
        }
        else if($perfil == 2) {
            $user = User::find($id);
            if(asset($user)) {
                if($request -> input('cpf') == $user -> cpf) {
                    $count_cpf = 0;
                }

                if($request -> input('email') == $user -> email) {
                    $count_email = 0;
                }
            }
        }
        else {
            $biblioteca = Biblioteca::find($id);
            if(asset($biblioteca)) {
                if($request -> input('cpf') == $biblioteca -> cpf) {
                    $count_cpf = 0;
                }

                if($request -> input('email') == $biblioteca -> email) {
                    $count_email = 0;
                }
            }
        }

        if($count_cpf == 0) {
            if($count_email == 0) {
                if($perfil == 1) {
                    if(isset($admin)) {
                        $admin -> name  = $request -> input('nome');
                        $admin -> cpf   = $request -> input('cpf');
                        $admin -> email = $request -> input('email');
                        if($request -> input('senha') != '') {
                            $admin -> password = bcrypt($request -> input('senha'));
                        }                
                        $admin -> perfil_id = $perfil;
                        $admin -> save();
                        return json_encode($admin);
                    }
                    return response('Usuário não encontrado', 404);
                }
                else if($perfil == 2) {
                    if(isset($user)) {
                        $user -> name = $request -> input('nome');
                        $user -> cpf   = $request -> input('cpf');
                        $user -> email = $request -> input('email');
                        if($request -> input('senha') != '') {
                            $user -> password  = bcrypt($request -> input('senha'));
                        }                
                        $user -> perfil_id =  $perfil;
                        $user -> save();
                        return json_encode($user);
                    }
                    return response('Usuário não encontrado', 404);
                }
                else if($perfil == 3) {
                    if(isset($biblioteca)) {
                        $biblioteca -> name  = $request -> input('nome');
                        $biblioteca -> cpf   = $request -> input('cpf');
                        $biblioteca -> email = $request -> input('email');
                        if($request -> input('senha') != '') {
                            $biblioteca -> password  = bcrypt($request -> input('senha'));
                        }                
                        $biblioteca -> perfil_id =  $perfil;
                        $biblioteca -> save();
                        return json_encode($biblioteca);
                    }
                    return response('Usuário não encontrado', 404);
                }
            } 
            else {
                return -1;
            }           
        }
        else {
            return 0;
        }        
    }

    public function destroy($perfil, $id) {
        if($perfil == 1) {
            $admin = Admin::find($id);
            if(isset($admin)) {
                $admin -> delete();
                return response('Apagado!', 200);
            }
            return response('Usuário não encontrado', 404);
        }
        else if($perfil == 2) {
            $user = User::find($id);
            if(isset($user)) {
                $user -> delete();
                return response('Apagado', 200);
            }
            return response('Usuário não encontrado', 404);
        }
        else if($perfil == 3) {
            $biblioteca = Biblioteca::find($id);
            if(isset($biblioteca)) {
                $biblioteca -> delete();
                return response('Apagado', 200);
            }
            return response('Usuário não encontrado', 404);
        }
    }
}

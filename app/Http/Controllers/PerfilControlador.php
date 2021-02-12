<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PerfilControlador extends Controller {
    public function indexJson() {
        $perfils = Perfil::all();
        return $perfils -> toJson();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutorControlador extends Controller {
    
    public function __construct() {
        $this -> middleware('auth:admin' OR 'auth:bb');
    }
    
    public function indexJson() {
        $autores = Autor::all();
        return $autores -> toJson();
    }
}

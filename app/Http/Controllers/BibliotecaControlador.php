<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BibliotecaControlador extends Controller {

    public function __construct() {
        $this -> middleware('auth:bb');
    }

    public function index() {
        return view('biblioteca');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('home');
    }

    public function indexHistorico() {
        $id = Auth::id();
        return view('historico', compact('id'));
    }

    public function indexRenovar() {
        $cpf= Auth::user() -> cpf;
        return view('renovacao', compact('cpf'));
    }

    public function indexReserva() {
        $id= Auth::id();
        return view('reserva', compact('id'));
    }
}

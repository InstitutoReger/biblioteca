<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BibliotecaLoginControlador extends Controller {

    public function __construct() {
        $this->middleware('guest:bb');
    }
    
    public function login(Request $request) {
        $this -> validate($request, [
            'email'    => 'required|string',
            'password' => 'required'
        ]);

        $credentials = [
            'email'    => $request -> email,
            'password' => $request -> password
        ];

        $authOk = Auth::guard('bb') -> attempt($credentials, $request -> remenber);

        if($authOk) {
            return redirect() -> intended(route('home.bb'));
        }

        return redirect() -> back() -> withInputs($request -> only('email', 'remember'));
    }

    public function index() {
        return view('auth.biblioteca_login');
    }
}

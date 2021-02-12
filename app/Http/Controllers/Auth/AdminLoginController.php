<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminLoginController extends Controller {

    public function __construct() {
        $this->middleware('guest:admin');
    }
     
    public function login(Request $request) {

        $this -> validate($request, [
            'email' => 'required|string',
            'password' => 'required'
        ]);

        $credentials = [
            'email'    => $request -> email,
            'password' => $request -> password
        ];

        $authOk = Auth::guard('admin') -> attempt($credentials, $request -> remenber);

        if($authOk) {
            return redirect() -> intended(route('admin.dashbord'));
        }

        return redirect() -> back() -> withInputs($request -> only('email', 'remember'));

    }

    public function index() {
        return view('auth.admin_login');
    }    
}

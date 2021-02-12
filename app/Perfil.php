<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {
    function usuario() {
        return $this -> hasMany('App\User');
    }

    function admin() {
        return $this -> hasMany('App\Admin');
    }

    function biblioteca() {
        return $this -> hasMany('App\Biblioteca');
    }
}

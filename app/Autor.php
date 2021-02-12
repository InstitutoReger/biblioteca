<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model {

    protected $table = 'autores';
    
    function obras() {
        return $this -> hasMany('App\Obra');
    }
}

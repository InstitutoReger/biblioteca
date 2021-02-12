<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model{
    function autor() {
        return $this -> belongsTo('App\Autor');
    }
}

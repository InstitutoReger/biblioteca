<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Obra;


class Historico extends Model {
    function user() {
        return $this -> belongsTo('App\User');
    }

    function obra() {
        return $this -> belongsTo('App\Obra');
    }
}

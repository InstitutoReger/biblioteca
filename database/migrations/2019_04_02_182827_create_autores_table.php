<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoresTable extends Migration {
    
    public function up() {
        Schema::create('autores', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('autores');
    }
}

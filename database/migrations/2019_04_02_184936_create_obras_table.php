<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration {
    
    public function up() {
        Schema::create('obras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo') -> unique();
            $table->string('titulo');
            $table->integer('edicao');
            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autores');
            $table->string('data_publicacao');
            $table->string('editora');
            $table->integer('estoque');
            $table->string('arquivo');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('obras');
    }
}
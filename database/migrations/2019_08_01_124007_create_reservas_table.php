<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration{
    
    public function up() {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->bigInteger('user_id') -> unsigned();
            $table->foreign('user_id')    -> references('id') -> on('users');
            $table->bigInteger('obra_id') -> unsigned();
            $table->foreign('obra_id')    -> references('id') -> on('obras');
            $table->dateTime('validade');
            $table->timestamps();
        });
    }
    
    public function down() {
        Schema::dropIfExists('reservas');
    }
}

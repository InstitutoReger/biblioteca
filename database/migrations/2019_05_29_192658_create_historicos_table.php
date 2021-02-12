<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id') -> unsigned();
            $table->foreign('user_id') -> references('id')->on('users');
            $table->bigInteger('obra_id') -> unsigned();
            $table->foreign('obra_id') -> references('id')->on('obras');
            $table->dateTime('data_emprestimo');
            $table->dateTime('data_devolucao');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicos');
    }
}

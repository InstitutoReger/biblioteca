<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration {
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->bigInteger('id') -> unsigned();
            $table->bigInteger('user_id') -> unsigned();
            $table->foreign('user_id') -> references('id')->on('users');
            $table->bigInteger('obra_id') -> unsigned();
            $table->foreign('obra_id') -> references('id')->on('obras');
            $table->dateTime('data_emprestimo');
            $table->dateTime('data_devolucao');           
            $table->timestamps();
            $table->primary(['id', 'user_id', 'obra_id']);
        });
    }

    public function down() {
        Schema::dropIfExists('emprestismos');
    }
}

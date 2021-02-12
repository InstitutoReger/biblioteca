<?php

use Illuminate\Database\Seeder;

class PerfilsSeeder extends Seeder {
    public function run() {
        DB::table('perfils') -> insert([
            'name' => 'Administrador'
        ]);
        DB::table('perfils') -> insert([
            'name' => 'Aluno'
        ]);
        DB::table('perfils') -> insert([
            'name' => 'Biblioteca'
        ]);
    }
}

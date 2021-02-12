<?php

use Illuminate\Database\Seeder;

class BibliotecasSeeder extends Seeder {
    public function run() {
        DB::table('bibliotecas') -> insert([
            'name'      => 'BB 1',
            'cpf'       => '896.624.850-07',
            'email'     => 'bb@gmail.com',
            'password'  => Hash::make('bb'),
            'perfil_id' => 3
        ]);
        DB::table('bibliotecas') -> insert([
            'name'      => 'BB 2',
            'cpf'       => '462.666.210-29',
            'email'     => 'bb2@gmail.com',
            'password'  => Hash::make('bb'),
            'perfil_id' => 3
        ]);
        DB::table('bibliotecas') -> insert([
            'name'      => 'BB 3',
            'cpf'       => '083.319.660-07',
            'email'     => 'bb3@gmail.com',
            'password'  => Hash::make('bb'),
            'perfil_id' => 3
        ]);
        DB::table('bibliotecas') -> insert([
            'name'      => 'BB 4',
            'cpf'       => '074.569.090-40',
            'email'     => 'bb4@gmail.com',
            'password'  => Hash::make('bb'),
            'perfil_id' => 3
        ]);
        DB::table('bibliotecas') -> insert([
            'name'      => 'BB 5',
            'cpf'       => '683.147.880-82',
            'email'     => 'bb5@gmail.com',
            'password'  => Hash::make('bb'),
            'perfil_id' => 3
        ]);
        DB::table('bibliotecas') -> insert([
            'name'      => 'BB 6',
            'cpf'       => '709.091.420-84',
            'email'     => 'bb6@gmail.com',
            'password'  => Hash::make('bb'),
            'perfil_id' => 3
        ]);
    }
}

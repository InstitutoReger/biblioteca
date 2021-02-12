<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder {

    public function run() {
        DB::table('users') -> insert([
            'name'      => 'Aluno 1',
            'cpf'       => '951.751.120-58',
            'email'     => 'aluno1@gmail.com',
            'password'  => Hash::make('12345678'),
            'perfil_id' => 2
        ]);
        DB::table('users') -> insert([
            'name'      => 'Aluno 2',
            'cpf'       => '773.352.100-97',
            'email'     => 'aluno2@gmail.com',
            'password'  => Hash::make('12345678'),
            'perfil_id' => 2
        ]);
        DB::table('users') -> insert([
            'name'      => 'Aluno 3',
            'cpf'       => '889.015.950-28',
            'email'     => 'aluno3@gmail.com',
            'password'  => Hash::make('12345678'),
            'perfil_id' => 2
        ]);
        DB::table('users') -> insert([
            'name'      => 'Aluno 4',
            'cpf'       => '039.680.791-75',
            'email'     => 'aluno4@gmail.com',
            'password'  => Hash::make('12345678'),
            'perfil_id' => 2
        ]);
        DB::table('users') -> insert([
            'name'      => 'Aluno 5',
            'cpf'       => '396.489.210-67',
            'email'     => 'aluno5@gmail.com',
            'password'  => Hash::make('12345678'),
            'perfil_id' => 2
        ]);
        DB::table('users') -> insert([
            'name'      => 'Aluno 6',
            'cpf'       => '731.445.610-02',
            'email'     => 'aluno6@gmail.com',
            'password'  => Hash::make('12345678'),
            'perfil_id' => 2
        ]);
    }
}

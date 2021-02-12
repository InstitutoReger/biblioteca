<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder {
    public function run() {
        DB::table('admins') -> insert([
            'name'      => 'ADM 1',
            'cpf'       => '218.170.850-93',
            'email'     => 'adm@gmail.com',
            'password'  => Hash::make('adm'),
            'perfil_id' => 1
        ]);
        DB::table('admins') -> insert([
            'name'      => 'ADM 2',
            'cpf'       => '139.880.320-00',
            'email'     => 'adm2@gmail.com',
            'password'  => Hash::make('adm'),
            'perfil_id' => 1
        ]);
        DB::table('admins') -> insert([
            'name'      => 'ADM 3',
            'cpf'       => '346.268.530-99',
            'email'     => 'adm3@gmail.com',
            'password'  => Hash::make('adm'),
            'perfil_id' => 1
        ]);
        DB::table('admins') -> insert([
            'name'      => 'ADM 4',
            'cpf'       => '388.689.520-33',
            'email'     => 'adm4@gmail.com',
            'password'  => Hash::make('adm'),
            'perfil_id' => 1
        ]);
        DB::table('admins') -> insert([
            'name'      => 'ADM 5',
            'cpf'       => '204.082.310-76',
            'email'     => 'adm5@gmail.com',
            'password'  => Hash::make('adm'),
            'perfil_id' => 1
        ]);
        DB::table('admins') -> insert([
            'name'      => 'ADM 6',
            'cpf'       => '099.881.900-00',
            'email'     => 'adm6@gmail.com',
            'password'  => Hash::make('adm'),
            'perfil_id' => 1
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() {
        $this->call(PerfilsSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(BibliotecasSeeder::class);
        $this->call(AutoresSeeder::class);
        $this->call(ObrasSeeder::class);
        //$this->call(EmprestimosSeeder::class);
    }
}

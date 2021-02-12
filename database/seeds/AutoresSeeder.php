<?php

use Illuminate\Database\Seeder;

class AutoresSeeder extends Seeder {
    
    public function run() {
        DB::table('autores') -> insert([
            'name' => 'Autor',
            'lastname' => 'TEIXEIRA'
        ]);
        DB::table('autores') -> insert([
            'name' => 'Autor',
            'lastname' => 'PEIXOTO'
        ]);
        DB::table('autores') -> insert([
            'name' => 'Autor',
            'lastname' => 'MARINHO'
        ]);
    }
}

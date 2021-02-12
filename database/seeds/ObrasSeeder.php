<?php

use Illuminate\Database\Seeder;

class ObrasSeeder extends Seeder {
    public function run() {
        DB::table('obras') -> insert([
            'codigo' => '0001',
            'titulo' => 'Pai Rico Pai Pobre',
            'edicao' => 1,
            'autor_id' => 1,
            'data_publicacao' => '10/05/1994',
            'editora' => 'Editora A',
            'estoque' => 5,
            'arquivo' => 'imagens/BFtP0SJtsToSznvZv5zRKKz5U2gb0Pp1ico8k59e.png'
        ]);
        DB::table('obras') -> insert([
            'codigo' => '0002',
            'titulo' => 'Aprendendo a Desenvolver Aplicações Web',
            'edicao' => 2,
            'autor_id' => 2,
            'data_publicacao' => '10/05/1994',
            'editora' => 'Editora B',
            'estoque' => 4,
            'arquivo' => 'imagens/kDX6PldkTYfUUYozzRQM5k5NeCsz10ZU6NdrC2No.jpeg'
        ]);
        DB::table('obras') -> insert([
            'codigo' => '0003',
            'titulo' => 'Cangaceiro JavaScript',
            'edicao' => 1,
            'autor_id' => 1,
            'data_publicacao' => '10/05/1994',
            'editora' => 'Editora C',
            'estoque' => 2,
            'arquivo' => 'imagens/cNMN05O9wyxMS8MlmGt8trJ0NCm5MJo4HNJkkWBp.jpeg'
        ]);
        DB::table('obras') -> insert([
            'codigo' => '0004',
            'titulo' => 'PHP Programando com Orientação a Objetos',
            'edicao' => 3,
            'autor_id' => 3,
            'data_publicacao' => '10/05/1994',
            'editora' => 'Editora D',
            'estoque' => 4,
            'arquivo' => 'imagens/GI0GPqT7dw2aMygbPEdCuhGzUtyaXKGIeKLVdpnA.jpeg'
        ]);
    }
}

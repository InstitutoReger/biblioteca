<html>
    <head>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col">
                <div class="card">
                    <div class="card-title">Confirmação de Emprestimo</div>
                    <p>Aluno: {{ $nome }}</p>
                    <p>Obra: {{ $titulo }}</p>
                    <p>Autor: {{ $sobrenome_autor }}. {{ $nome_autor }}</p>
                    <p>Data de Retirada: {{ $data_emprestimo }}</p>
                    <p>Data de Devolução: {{ $data_devolucao }}</p>
                </div>                
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
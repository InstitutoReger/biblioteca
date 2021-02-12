@extends('layouts.layout-padrao')

@section('content')
<div class="container">
    
    <div class="card border">
        <div class="card-body">
            <input type="hidden" value="{{ $id }}" id="user_id">
            <h5 class="card-title" style="margin-bottom: 10px;" id="titulo"></h5>
            
            <table class="table table-ordered table-hover" style="margin-top: 40px;" id="tabela-historico">
                <thead>
                    <th>Imagem</th>
                    <th>Obra</th>
                    <th>Emprestimo</th>
                    <th>Devolução</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>  
</div>

@endsection

@section('script-alunos')
    <script src="{{ asset('js/main-aluno.js') }}" type="text/javascript"></script>
@endsection

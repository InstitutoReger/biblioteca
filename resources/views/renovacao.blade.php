@extends('layouts.layout-padrao')

@section('content')
<div class="container">    
    <div class="card border">
        <div class="card-body">
            <input type="hidden" value="{{ $cpf }}" id="user_cpf">
            <h5 class="card-title" style="margin-bottom: 10px;" id="titulo"></h5>
            <div id="tabela">

            </div>
        </div>
    </div>  
</div>

<div class="modal" tabindex="-1" role="dialog" id="confirmar-renovacao">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmação</h5>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja devolver emprestimo?</p>
            </div>            
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('script-alunos')
    <script src="{{ asset('js/main-aluno.js') }}" type="text/javascript"></script>
@endsection

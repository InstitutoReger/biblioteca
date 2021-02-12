@extends('layouts.layout-padrao')

@section('content')
<div class="container">    
    <div class="card border">
        <div class="card-body">
            <div class="card-title">
                <h5 style="margin-bottom: 10px;">Obras</h5>
                <select class="select-obras" style="width: 40%;">
                <select>
            </div>           
            
            <table class="table table-ordered table-hover" id="tabela-obras" style="margin-top: 40px;">
                <thead>
                    <tr>  
                        <th>Capa</th>
                        <th>Código</th>
                        <th>Titulo</th>
                        <th>Estoque</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>  
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-obra">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo"></h5>
            </div>
            <div class="modal-body">
                <div class="card" style="width:400px; margin:0 auto;">
                    <div id="img">

                    </div>
                    <div class="card-body">

                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-confirmacao-reserva">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reserva de Obra</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" value="{{ $id }}" id="id-user">
                <p>Confima a renovação?</p>                
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-reserva">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmação de Reserva</h5>
            </div>
            <div class="modal-body">
                                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script-obras')
    <script src="{{ asset('js/main-aluno.js') }}" type="text/javascript"></script>
@endsection

@extends('layouts.layout-padrao')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary" style="margin: 20px; width: 100%;" id="emprestimo">Empréstimo</button>
        </div>  
        <div class="col-3">
            <button type="button" class="btn btn-dark" style="margin: 20px; width: 100%;" id="renovacao">Renovação</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary" style="margin: 20px; width: 100%;" id="devolucao">Devolução</button>
        </div>
    </div>

    <div class="card border">
        <div class="card-body row">
            <div class="servicos col-5">
                
            </div>
            <div class="dados col-7">
                
            </div>       
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onClick="emprestar()">Realizar Emprestimo</button>
        </div>
    </div> 
</div>

<div class="modal" tabindex="-1" role="dialog" id="dados-emprestimo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Emprestimo</h5>
            </div>
            <div class="modal-body">
                <div id="name"></div>
                <div id="obra"></div>
                <div id="datas"></div>
            </div>            
            <div class="modal-footer">
                <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
                <p>Tem certeza que deseja renovar emprestimo?</p>
            </div>            
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="confirmar-devolucao">
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

@section('script-servicos')
    <script src="{{ asset('js/main-servicos.js') }}" type="text/javascript"></script>    
@endsection

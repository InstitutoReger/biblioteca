@extends('layouts.layout-padrao')

@section('content')
<div class="container">    
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Novo Autor</h5>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="nome-autor" class="control-label">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nome-autor">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="sobrenome-autor" class="control-label">Sobrenome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="sobrenome-autor">
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>            
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-sm" role="button" onClick="salvarAutor()">Salvar</button>
        </div>
    </div>

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Autores</h5>
            <table class="table table-ordered table-hover" id="tabela-autores">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card border" style="margin-top:50px;">
        <div class="card-body">
            <h5 class="card-title">Nova Categoria</h5>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="categoria" class="control-label">Categoria</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="categoria">
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>            
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-sm" role="button" onClick="salvarCategoria()">Salvar</button>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="confirmacao">
    <div class="modal-dialog" roles="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Confirmação</h5>
            </div>
            <div class="modal-body">
                <p>Autor inserido com sucesso</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>           
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-apagar-autor">
    <div class="modal-dialog" roles="document">
        <div class="modal-content" >

            <div class="modal-header">
                <h5 class="modal-title">Apagar Autor</h5>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja apagar a Autor</p>
            </div>
            <div class="modal-footer footer-apagar-autor">
                                
            </div>
           
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-autor-editar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" class="form-horizontal" id="form-autor-editar">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Autor</h5>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id-autor-editar" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome-autor-editar" class="control-label">Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nome-autor-editar">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sobrenome-autor-editar" class="control-label">Sobrenome</label>
                        <div class="input-group">
                            <input type="text" class="form-control cpf" id="sobrenome-autor-editar">
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('script-cadastro')
    <script src="{{ asset('js/main-cadastro.js') }}" type="text/javascript"></script>
@endsection

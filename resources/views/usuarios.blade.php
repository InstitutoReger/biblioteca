@extends('layouts.layout-padrao')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        @if(url()->previous() === "http://localhost:9000/admin")
            <div class="col-3">
                <button type="button" class="btn btn-primary" style="margin: 20px; width: 100%;" onClick="carregarUsuarios()">Alunos</button>
            </div>      
            <div class="col-3">
                <button type="button" class="btn btn-dark" style="margin: 20px; width: 100%;" onClick="carregarBiblioteca()">Biblioteca</button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-secondary" style="margin: 20px; width: 100%;" onClick="carregarAdmins()">Administradores</button>
            </div>
        @endif
    </div>

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title" style="margin-bottom: 10px;">Usuários</h5>
            <select class="select-user" style="width: 40%;">
            <select>
            <table class="table table-ordered table-hover" id="tabela-usuarios" style="margin-top: 40px;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onClick="novoUsuario()">Novo Usuário</button>
        </div>
    </div>  
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-novo-usuario">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" class="form-horizontal" id="form-usuario">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Usuário</h5>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id-usuario" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="perfil-atual" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="nome-usuario" class="control-label">Nome do Usuário</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nome-usuario">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf-usuario" class="control-label">CPF</label>
                        <div class="input-group">
                            <input type="text" class="form-control cpf" id="cpf-usuario">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email-usuario" class="control-label">E-mail</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email-usuario">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senha-usuario" class="control-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha-usuario">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="perfil-usuario" class="control-label">Perfil</label>
                        <div class="input-group">
                        @if(url()->previous() === "http://localhost:9000/admin")                   
                            <select class="form-control perfil-options" id="perfil-usuario">
                            
                            </select>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        @else
                            <select class="form-control" id="perfil-usuario" style="cursor: pointer;">
                                <option value="0" selected>Perfil...</option>
                                <option value="2">Aluno</option>
                            </select>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                         @endif
                        </div>
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

<div class="modal" tabindex="-1" role="dialog" id="dlg-apagar-usuario">
    <div class="modal-dialog" roles="document">
        <div class="modal-content" >

            <div class="modal-header">
                <h5 class="modal-title">Apagar Usuário</h5>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja apagar o usuário?</p>
            </div>
            <div class="modal-footer footer-apagar-usuario">
                                
            </div>           
        </div>
    </div>
</div>
@endsection

@section('script-usuarios')
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Painel da Biblioteca</div>
                <div class="card-body">
                    <div class="container" style="text-align: center;">
                        <div class="row">
                            <div class="col">
                                <div class="card" style="width: 15rem;">
                                    <span class="card-img-top" style="font-size: 120px;">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="card-body" style="margin-top: -25px;">
                                        <h5 class="card-title">Usuários</h5>
                                        <p class="card-text">Adicionar, Editar e Remover</p>
                                        <a href="/usuarios" class="btn btn-primary">Entrar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="card" style="width: 15rem;">
                                    <span class="card-img-top" style="font-size: 120px;">
                                        <i class="fas fa-book"></i>
                                    </span>
                                    <div class="card-body" style="margin-top: -25px;">
                                        <h5 class="card-title">Obras</h5>
                                        <p class="card-text">Adicionar, Editar e Remover</p>
                                        <a href="/obras" class="btn btn-primary">Entrar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="card" style="width: 15rem;">
                                    <span class="card-img-top" style="font-size: 120px;">
                                        <i class="fas fa-cogs"></i>
                                    </span>
                                    <div class="card-body" style="margin-top: -25px;">
                                        <h5 class="card-title">Cadastro Geral</h5>
                                        <p class="card-text">Adicionar, Editar e Remover</p>
                                        <a href="/cadastros" class="btn btn-primary">Entrar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 15rem;">
                                    <span class="card-img-top" style="font-size: 120px;">
                                        <i class="fas fa-book-open"></i>
                                    </span>
                                    <div class="card-body" style="margin-top: -25px;">
                                        <h5 class="card-title">Biblioteca</h5>
                                        <p class="card-text" style="width: 200px;">Emprestar, Renovar e Devolver</p>
                                        <a href="/servicos" class="btn btn-primary">Entrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

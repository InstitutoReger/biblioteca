@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Painel do Usuário</div>
                <div class="card-body">
                    <div class="container" style="text-align: center;">
                        <div class="row">
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <span class="card-img-top" style="font-size: 120px;">
                                        <i class="fas fa-book"></i>
                                    </span>
                                    <div class="card-body" style="margin-top: -25px;">
                                        <h5 class="card-title">Reservas</h5>
                                        <p class="card-text">Adicionar, Editar e Remover</p>
                                        <a href="/reserva" class="btn btn-primary">Entrar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="card" style="width: 18rem;">
                                    <span class="card-img-top" style="font-size: 120px;">
                                    <i class="fas fa-book-open"></i>
                                    </span>
                                    <div class="card-body" style="margin-top: -25px;">
                                        <h5 class="card-title">Renovação</h5>
                                        <p class="card-text">Renovar um Empréstimo</p>
                                        <a href="/renovar" class="btn btn-primary">Entrar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="card" style="width: 18rem;">
                                    <span class="card-img-top" style="font-size: 120px;">
                                    <i class="fas fa-history"></i>
                                    </span>
                                    <div class="card-body" style="margin-top: -25px;">
                                        <h5 class="card-title">Histórico</h5>
                                        <p class="card-text">Ver Histórico de Empréstimos</p>
                                        <a href="/historico" class="btn btn-primary">Entrar</a>
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


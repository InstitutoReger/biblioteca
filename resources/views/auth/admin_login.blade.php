@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script>
    var altura_tela = $(window).height() - 200;
    
    $("body").height(altura_tela);
</script> 
<style>
    body {
            background-color: #F0F0F0;
            display: flex;
            justify-content: center;
            align-items: center;
    }
    .navbar {
        display: none;
    }  
</style>

<div class="container ">    
    <div class="row justify-content-center">
        <div class="col-md-9">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Biblioteca Rede Itego" style="width:100%;">
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top: 25px;">
        <div class="col-md-12">
            <div class="card">                
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        
                        <div class="form-group row-sm">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->
                            <input placeholder="usuário" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                                
                        </div>

                        <div class="form-group row-sm">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->
                            <input placeholder="senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class=" row justify-content-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #000;">
                                    Esqueceu sua senha?
                                </a>
                            @endif
                        </div>

                        <div class="form-group row justify-content-center">                           
                            <button type="submit" class="btn btn-dark">
                                Entrar
                            </button>
                        </div>                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

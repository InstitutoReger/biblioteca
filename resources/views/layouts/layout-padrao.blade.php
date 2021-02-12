<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesone -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Biblioteca - Rede Itego</title> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url()->previous() }}">
                    Biblioteca
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">                     
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url()->previous() }}">Home</a>                        
                        </li>                       
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>

    @hasSection('script-usuarios')
        @yield('script-usuarios')
    @endif 

    @hasSection('script-obras')
        @yield('script-obras')
    @endif  

    @hasSection('script-cadastro')
        @yield('script-cadastro')
    @endif

    @hasSection('script-servicos')
        @yield('script-servicos')
    @endif
    
    @hasSection('script-alunos')
        @yield('script-alunos')
    @endif 

    <script type="text/javascript">
        function token() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':"{{ csrf_token() }}"
                }
            });
        }
    </script>
    
</body>
</html>

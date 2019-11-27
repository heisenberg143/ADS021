<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>G3</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <a class="navbar-brand mr-auto mr-lg-0" href="/template">G3 Camiseteria</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/tipo_item">Tipos de Itens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/endereco">Endereços</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cliente">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/orcamento">Orçamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/orcamento_item">Orçamento dos Itens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/funcionario">Funcionários</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Novo Cadastro') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<main role="main" class="container" style="margin-top: 60px;">
    @yield('conteudo')
    @yield('titulo')
</main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Fonte do Google -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/script.js" defer></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />


</head>
<body>
    <header>
        <nav class="navbar navbar-inverse navbar-light bg-light">
            <div class="container-fluid" id="navbar">
              <a href="{{ route('inicial') }}" class="navbar-brand">
                <img src="img/Logo_Promobit_Azul.png" class="rounded" alt="logomarca" height="60" width="130" >
              </a>
              <div>
                @auth
                <ul class="navbar-nav navbar-right">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"><ion-icon name="person"></ion-icon> Meu Painel </a>
                  </li>
                  <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <a
                      href="{{ route('logout') }}"
                      class="nav-link"
                      onclick="event.preventDefault();this.closest('form').submit();"><ion-icon name="log-out"></ion-icon> Logout </a>
                    </form>
                  </li>
                </ul>
                @endauth
                @guest
                <ul class="nav navbar-nav navbar-right">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><ion-icon name="person"></ion-icon> Sign Up </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><ion-icon name="log-in"></ion-icon> Login </a>
                  </li>
                </ul>
                @endguest
              </div>
              <!-- Botão de Expansão -->
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
              </button>
              <!-- Início do Canvas -->
              <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <h2 class="offcanvas-title" id="offcanvasExampleLabel">PROMOBIT</h2>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h5>Menu</h5>
                    <input type="text" id="pesquisaMenu" onkeyup="FuncaoPesquisaMenu()" placeholder="Pesquisa menu..">
                    <ul class="navbar-nav" id="MenuOpcao">
                        <li class="nav-item">
                          <a href="/inicial" class="nav-link">Pagina Inicial</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('relatorio') }}">Relatórios</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Produtos</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('indexProduct') }}">Lista Produtos</a></li>
                            <li><a class="dropdown-item" href="{{ route('createProduct') }}">Cadastrar Produtos</a></li>
                          </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tags</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('indexTag') }}">Lista Tags</a></li>
                            <li><a class="dropdown-item" href="{{ route('createTag') }}">Cadastrar Tags</a></li>
                          </ul>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
        </nav>
    </header>
    <!-- Classe para mensagens de confirmação -->
    <main>
        <div class="container-fluid">
            <div class="row">

                @yield('content')
                <script>
                    $(document).ready(function(){
                        $("#inputPesquisa").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#tabelaPesquisa tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                        });
                    });
                </script>
            </div>
        </div>
        <!-- Script com função de pesquisa lista de tabelas -->

    </main>

    <footer>
        <p >José Carlos &copy; {{date('d/m/Y')}}</p>
    </footer>
    <!-- Script do Framework Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>

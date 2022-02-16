<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório</title>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/script.js" defer></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    @component('components.title_center')
        Dados Relatório
    @endcomponent
    <div class="container" id="modelo_container">
        <div class="container">
            @foreach ($relatorioSinteticos as $relatorioSintetico)
                <div id="componentPanelRelatorio" class="panel-group">
                    <div class="panel-heading">
                        <h2>{{$relatorioSintetico->nomeTag}}</h2>
                    </div>
                </div>
                @if ($relatorioSintetico->quantidadeProduto > 0)
                    <table class="table table-striped table-hover">
                        <thead class="table-success" >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produto</th>
                            </tr>
                        </thead>
                        <tbody id="tabelaPesquisa">
                            @foreach ($relatorioAnaliticos as $key => $relatorioAnalitico)
                                @if ($relatorioAnalitico->idTag == $relatorioSintetico->idTag)
                                    <tr>
                                        <th scope="row">{{($loop->index)+1}}</th>
                                        <td>{{$relatorioAnalitico->nomeProduto}}</td>
                                    </tr>
                                @endif
                            @endforeach

                                <tr>
                                    <th class="tdShow">Total Produtos:</th>
                                    <td>{{$relatorioSintetico->quantidadeProduto}}</td>
                                </tr>
                        </tbody>
                    </table>
                @else
                    <h5>Não há produtos vinculados nessa Tag</h5>
                @endif
            @endforeach


        </div>
    </div>


    <footer>
        <p >José Carlos &copy; {{date('d/m/Y')}}</p>
    </footer>
    <!-- Script do Framework Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

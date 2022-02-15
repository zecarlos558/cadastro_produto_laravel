@extends('layout.main')
@section('title')
    Relatório
@endsection

@section('content')
    @component('components.title_center')
        Relatório
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <h2>Listando os dados do Relatório</h2>
        <div class="container">
            @foreach ($relatorioSinteticos as $relatorioSintetico)
                <div id="componentPanelRelatorio" class="panel-group">
                    <div class="panel-heading">
                        <h2>{{$relatorioSintetico->nomeTag}}</h2>
                    </div>
                </div>
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
                                    <td><p>{{$relatorioAnalitico->nomeProduto}}</p></td>
                                </tr>
                            @endif
                        @endforeach
                        @if ($relatorioSintetico->quantidadeProduto > 0)
                            <tr>
                                <th class="tdShow">Total Produtos:</th>
                                <td>{{$relatorioSintetico->quantidadeProduto}}</td>
                            </tr>
                        @else
                            <p>Não há produtos vinculados nessa Tag</p>
                        @endif
                    </tbody>
                </table>
            @endforeach


        </div>
    </div>
@endsection

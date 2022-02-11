@extends('layout.main')
@section('title')
    Product
@endsection

@section('content')
    @component('components.title_center')
        Listar Produto
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <h2>Listando os dados dos produtos</h2>
        <div id="lista_container" class="container-fluid">
            <table class="table table-striped table-hover">
                <thead class="table-dark" >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody id="tabelaPesquisa">
                    @foreach ($produtos as $produto)
                    {{-- <tr onclick="selecionaObjeto(this,'produto')"> --}}
                    <tr>
                        <th scope="row">{{($loop->index)+1}}</th>
                        <td><a href="/product/show/{{$produto->id}}">{{$produto->name}}</a></td>
                        <td id="tbodyLista">
                            <a class="btn btn-info edit-btn" href="/product/edit/{{$produto->id}}" role="button"><ion-icon name="create"></ion-icon>Editar</a>
                            <form action="/product/{{$produto->id}}" id="formButtons" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

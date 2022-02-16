@extends('layout.main')
@section('title')
    Tag
@endsection

@section('content')
    @component('components.title_center')
        Listar Tag
    @endcomponent
    @component('components.confirm_request')@endcomponent
    <div class="container-fluid" id="modelo_container">
        <h2>Listando os dados das Tags</h2>
        @component('components.center_search')
            Pesquisar Tag
        @endcomponent
        <div class="d-flex justify-content mb-4">
            <a class="btn btn-primary" href=" {{ route('createTag') }} ">Cadastrar Tag</a>
        </div>
        <div id="lista_container" class="container-fluid">
            <table class="table table-striped table-hover">
                <thead class="table-dark" >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Total Produtos</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody id="tabelaPesquisa">
                    @foreach ($tags as $tag)
                    {{-- <tr onclick="selecionaObjeto(this,'produto')"> --}}
                    <tr>
                        <th scope="row">{{($loop->index)+1}}</th>
                        <td><a href="{{ route('showTag', $tag->id) }}">{{$tag->name}}</a></td>
                        <td><p>{{count($tag->products)}}</p></td>
                        <td id="tbodyLista">
                            <a class="btn btn-info edit-btn" href="{{ route('editTag', $tag->id) }}" role="button"><ion-icon name="create"></ion-icon>Editar</a>
                            <form action="{{ route('deleteTag', $tag->id) }}" id="formButtons" method="POST">
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

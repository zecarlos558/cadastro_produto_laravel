@extends('layout.main')
@section('title')
    Detalhe Tag
@endsection

@section('content')
    @component('components.title_center')
        Detalhes Tag
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <div class="table-reponsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td class="tdShow">Nome:</td>
                        <td>{{$tag->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container-fluid" id="container_button" >
           <a class="btn btn-info edit-btn" href="{{ route('editTag', $tag->id)}}" role="button"><ion-icon name="create"></ion-icon>Editar</a>
           <form action="{{ route('deleteTag', $tag->id) }}" id="formButtons" method="POST">
           @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Deletar</button>
           </form>
        </div>
        <div class="container">
            @if ($produtos)
                    <h2 style="text-align: center;" >Produtos da Tag</h2>
                        <div id="lista-container" class="container">

                            <table class="table table-striped table-hover">
                                <thead class="table-dark" >
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produtos as $produto)
                                    {{-- <tr onclick="selecionaObjeto(this,'produto')"> --}}
                                    <tr>
                                        <th scope="row">{{($loop->index)+1}}</th>
                                        <td>{{$produto->name}}</td>
                                        <td>
                                            <form action="{{ route ('destroyProduct', ['idProduto' => $produto->id,'idTag' => $tag->id]) }}" id="formButtons" method="GET">
                                                @csrf

                                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            @else

            @endif
        </div>
    </div>
@endsection

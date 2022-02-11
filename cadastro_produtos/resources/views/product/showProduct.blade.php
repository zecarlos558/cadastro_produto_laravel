

@extends('layout.main')
@section('title')
    Página inicial
@endsection

@section('content')
    @component('components.title_center')
        Detalhes Produto
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <div class="table-reponsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td class="tdShow">Nome:</td>
                        <td>{{$produto->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container-fluid" id="container_button" >
           <a class="btn btn-info edit-btn" href="/produto/edit/{{$produto->id}}" role="button"><ion-icon name="create"></ion-icon>Editar</a>
           <form action="/product/{{$produto->id}}" id="formButtons" method="POST">
           @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Deletar</button>
        </div>
    </div>
@endsection

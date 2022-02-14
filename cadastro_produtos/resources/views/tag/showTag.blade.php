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
        </div>
    </div>
@endsection

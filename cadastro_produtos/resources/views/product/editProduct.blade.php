@extends('layout.main')
@section('title')
    Product
@endsection

@section('content')
    @component('components.title_center')
        Editar Produto
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <h2>Preencha os dados do produto</h2>
        <form action="{{ route('updateProduct', $produto->id) }}" method="POST">
        @csrf
        @component('components.erros_request')@endcomponent
          <div class="mb-3 mt-3">
            <label for="name">Nome:</label>
                <input type="text" class="form-control" value="{{ $produto->name }}" name="name" id="name" placeholder="Nome do produto">
          </div>
          <label for="" class="form-label">Tag</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{ $tagProduto }}" placeholder="Procurar Tag" list="tags" name="tag" id="tag">
                <datalist id="tags">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}} - {{$tag->name}}">
                    @endforeach
                </datalist>
                <button disabled class="btn btn-secondary">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        <button type="submit" class="btn btn-primary">Editar Produto</button>
        </form>
    </div>
@endsection

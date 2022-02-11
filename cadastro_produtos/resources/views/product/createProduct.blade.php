@extends('layout.main')
@section('title')
    Product
@endsection

@section('content')
    @component('components.title_center')
        Cadastrar Produto
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <h2>Preencha os dados do produto</h2>
        <form action="/product/store" method="POST">
            @csrf
            @component('components.erros_request')@endcomponent
            <div class="mb-3 mt-3">
                <label for="name">Nome:</label>
                    <input type="text" class="form-control" value="{{ old('name')}}" name="name" id="name" placeholder="Nome do produto">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
        </form>
    </div>
@endsection

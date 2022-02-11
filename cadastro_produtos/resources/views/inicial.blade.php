@extends('layout.main')
@section('title')
    Página inicial
@endsection

@section('content')
    @component('components.title_center')
        PÁGINA INICIAL
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <h1>Bem vindo</h1>
    </div>
@endsection

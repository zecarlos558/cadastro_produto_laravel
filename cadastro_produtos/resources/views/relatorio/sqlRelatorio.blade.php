@extends('layout.main')
@section('title')
    Relatório
@endsection

@section('content')
    @component('components.title_center')
        Relatório
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <h2>Listando o script do Relatório</h2>
        <div class="d-flex justify-content mb-4">
            <a class="btn btn-primary" href=" {{ route('geraPDF') }} ">Página para PDF</a>
        </div>
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Consulta Analítica</h1>
                    <p class="fs-4">{{$relatorioAnaliticos}}</p>
                </div>
            </div>
        </div>
        <div class="container px-lg-5 mt-3 ">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Consulta Sintética</h1>
                    <p class="fs-4">{{$relatorioSinteticos}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

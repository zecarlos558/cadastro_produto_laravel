@extends('layout.main')
@section('title')
    Página inicial
@endsection

@section('content')
    @component('components.title_center')
        PÁGINA INICIAL
    @endcomponent
    <div class="container-fluid" id="modelo_container">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-info rounded-3 text-center ">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Bem vindo!</h1>
                    <p class="fs-4">Este projeto foi feito com objetivo de testar e praticar os conhecimento e habilidades em desenvolvimento Back-End e Front-End</p>
                    {{-- <a class="btn btn-primary btn-lg" href="#!">Sobre </a> --}}
                </div>
            </div>
        </div>
        <!-- Page Content-->
        <section class="pt-4">
            <div class="container-fluid px-lg-5">
                <h2 class="pb-2 border-bottom">Produtos</h2>
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4" href="{{ route('createProduct') }}"><i class="bi bi-file-earmark-plus"></i></a>
                                <h2 class="fs-4 fw-bold">Cadastrar</h2>
                                <p class="mb-0">Função para cadastro de Produtos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4" ><i class="bi bi-pencil-square"></i></div>
                                <h2 class="fs-4 fw-bold">Editar</h2>
                                <p class="mb-0">Função para Editar produtos selecionados</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4" href="{{ route('indexProduct') }}"><i class="bi bi-list"></i></a>
                                <h2 class="fs-4 fw-bold">Listar</h2>
                                <p class="mb-0">Função para listar os produtos cadastrados</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-file-earmark-x"></i></div>
                                <h2 class="fs-4 fw-bold">Deletar</h2>
                                <p class="mb-0">Função para deletar produtos selecionados</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-lg-5">
                <h2 class="pb-2 border-bottom">Tags</h2>
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4" href="{{ route('createTag') }}"><i class="bi bi-file-earmark-plus"></i></a>
                                <h2 class="fs-4 fw-bold">Cadastrar</h2>
                                <p class="mb-0">Função para cadastro de Tags</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-pencil-square"></i></i></div>
                                <h2 class="fs-4 fw-bold">Editar</h2>
                                <p class="mb-0">Função para Editar tags selecionados</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4" href="{{ route('indexTag') }}"><i class="bi bi-list"></i></a>
                                <h2 class="fs-4 fw-bold">Listar</h2>
                                <p class="mb-0">Função para listar as tags cadastrados</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-file-earmark-x"></i></div>
                                <h2 class="fs-4 fw-bold">Deletar</h2>
                                <p class="mb-0">Função para deletar tags selecionados</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-lg-5">
                <h2 class="pb-2 border-bottom">Extração</h2>
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4" href="{{ route('relatorio') }}"><i class="bi bi-clipboard-data"></i></a>
                                <h2 class="fs-4 fw-bold">Relatório</h2>
                                <p class="mb-0">Função de consulta de relatório de tags sumarizada com seus produtos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4" href="{{ route('geraSQL') }}"><i class="bi bi-file-earmark-code-fill"></i></a>
                                <h2 class="fs-4 fw-bold">SQL</h2>
                                <p class="mb-0">SQL com listagem de Tags mais um sumarizador de Produtos atrelado a cada Tag;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

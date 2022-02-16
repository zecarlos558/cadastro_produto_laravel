<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <p>Você está Logado!</p>

                        <h2 class="pb-2 border-bottom"><p>Dados do Usuário:</p></h2>
                    <div class="table-reponsive mt-3">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td class="tdShow">ID:</td>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <td class="tdShow">Nome:</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td class="tdShow">Email:</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

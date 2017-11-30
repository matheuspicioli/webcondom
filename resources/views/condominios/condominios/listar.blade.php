@extends('layouts.app')
@section('titulo', 'Condomínios - Lista')
@section('conteudo')
    <pagina tamanho="12">
        <painel titulo="Lista de condomínios" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('condominios.condominios.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($condominios as $condominio)
                    <tr>
                        <td>{{ $condominio->id }}</td>
                        <td>{{ $condominio->nome }}</td>
                        <td>{{ $condominio->endereco->endereco_formatado }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('condominios.condominios.exibir', ['id' => $condominio->id ]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection
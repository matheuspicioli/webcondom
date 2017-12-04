@extends('layouts.app')
@section('titulo', 'Inquilinos - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de inquilinos">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('entidades.inquilinos.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Código</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inquilinos as $inquilino)
                    <tr>
                        <td>{{ $inquilino->id }}</td>
                        <td>{{ $inquilino->entidade->nome }}</td>
                        <td>{{ $inquilino->entidade->cpf_cnpj }}</td>
                        <td>{{ $inquilino->codigo }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('entidades.inquilinos.exibir', ['id' => $inquilino->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

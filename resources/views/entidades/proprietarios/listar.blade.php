@extends('layouts.app')
@section('titulo', 'Proprietários - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de proprietários">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('entidades.proprietarios.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Data de nascimento</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proprietarios as $proprietario)
                    <tr>
                        <td>{{ $proprietario->id }}</td>
                        <td>{{ $proprietario->entidade->nome }}</td>
                        <td>{{ $proprietario->entidade->cpf_cnpj }}</td>
                        <td>
                            {{ $proprietario->entidade->tipo == 1
                                ? $proprietario->entidade->data_nascimento_formatado
                                : $proprietario->entidade->data_abertura_formatado }}
                        </td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('entidades.proprietarios.exibir', ['id' => $proprietario->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

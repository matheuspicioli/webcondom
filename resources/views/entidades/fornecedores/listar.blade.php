@extends('layouts.app')
@section('titulo', 'Fornecedores - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de fornecedores">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('entidades.fornecedores.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Tipo à fornecer</th>
                    <th>CPF/CNPJ</th>
                    <th>Código</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{ $fornecedor->entidade->nome }}</td>
                        <td>{{ $fornecedor->tipo_fornecer }}</td>
                        <td>{{ $fornecedor->entidade->cpf_cnpj }}</td>
                        <td>{{ $fornecedor->codigo }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('entidades.fornecedores.exibir', ['id' => $fornecedor->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

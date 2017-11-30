@extends('layouts.app')
@section('titulo', 'Funcionários - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de funcionários">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('entidades.funcionarios.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Departamento</th>
                    <th>Setor</th>
                    <th>Código</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->entidade->nome }}</td>
                        <td>{{ $funcionario->departamento->descricao }}</td>
                        <td>{{ $funcionario->setor->descricao }}</td>
                        <td>{{ $funcionario->codigo }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('entidades.funcionarios.exibir', ['id' => $funcionario->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

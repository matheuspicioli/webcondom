@extends('layouts.app')
@section('titulo', 'Setores - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de setores">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('diversos.setores.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($setores as $setor)
                    <tr>
                        <td>{{ $setor->id }}</td>
                        <td>{{ $setor->descricao }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('diversos.setores.exibir', ['id' => $setor->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

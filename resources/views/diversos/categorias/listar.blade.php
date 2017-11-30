@extends('layouts.app')
@section('titulo', 'Categorias - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de categorias">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('diversos.categorias.criar') }}" class="btn btn-primary">Cadastrar</a>
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
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->descricao }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('diversos.categorias.exibir', ['id' => $categoria->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

@extends('layouts.app')
@section('titulo', 'Cidades - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de cidades">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('enderecos.cidades.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>CodigoIBGE</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade->id }}</td>
                        <td>{{ $cidade->descricao }}</td>
                        <td>{{ $cidade->codigo_ibge ? $cidade->codigo_ibge : 'Vázio' }}</td>
                        <td>{{ $cidade->estado->descricao }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('enderecos.cidades.exibir', ['id' => $cidade->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection
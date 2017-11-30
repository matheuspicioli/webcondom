@extends('layouts.app')
@section('titulo', 'Tipos imóveis - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de setores">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('diversos.tiposimoveis.criar') }}" class="btn btn-primary">Cadastrar</a>
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
                @foreach($tiposImoveis as $tipoImovel)
                    <tr>
                        <td>{{ $tipoImovel->id }}</td>
                        <td>{{ $tipoImovel->descricao }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('diversos.tiposimoveis.exibir', ['id' => $tipoImovel->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

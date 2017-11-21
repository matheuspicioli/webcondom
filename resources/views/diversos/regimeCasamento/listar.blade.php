@extends('layouts.app')
@section('titulo', 'Regime de Casamento - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de Regimes de Casamento">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('diversos.regimeCasamento.criar') }}" class="btn btn-primary">Cadastrar</a>
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
                @foreach($regimeCasamento as $regimesCasamentos)
                    <tr>
                        <td>{{ $regimesCasamentos->id }}</td>
                        <td>{{ $regimesCasamentos->descricao }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('diversos.regimeCasamento.exibir', ['id' => $regimesCasamentos->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

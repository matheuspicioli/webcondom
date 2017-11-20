@extends('layouts.app')
@section('titulo', 'Estado Civil - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de Estado Civis">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('diversos.estadoCivil.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Conjuge?</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($estadoCivil as $estadosCivis)
                    <tr>
                        <td>{{ $estadosCivis->id }}</td>
                        <td>{{ $estadosCivis->Descricao }}</td>
                        <td>{{ $estadosCivis->exige_conjuge_formatado }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('diversos.estadoCivil.exibir', ['id' => $estadosCivis->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

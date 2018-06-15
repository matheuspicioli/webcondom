@extends('layouts.app')
@section('titulo', 'Estados - Lista')
@section('conteudo')
    <pagina tamanho="12">
        <painel titulo="Lista de estados" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('enderecos.estados.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr />
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Sigla</th>
                    <th>Código IBGE</th>
                </tr>
                </thead>
                <tbody>
                @foreach($estados as $estado)
                    <tr>
                        <td>{{ $estado->id }}</td>
                        <td>{{ $estado->descricao }}</td>
                        <td>{{ $estado->sigla }}</td>
                        <td>{{ $estado->codigo_ibge }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

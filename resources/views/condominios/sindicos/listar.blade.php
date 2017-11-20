@extends('layouts.app')
@section('titulo', 'Sindicos - Lista')
@section('conteudo')
    <pagina tamanho="12">
        <painel cor="panel-primary" titulo="Lista de sindicos">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('condominios.sindicos.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sindicos as $sindico)
                    <tr>
                        <td>{{ $sindico->id }}</td>
                        <td>{{ $sindico->nome }}</td>
                        <td>{{ $sindico->telefone ? $sindico->telefone : 'Vázio' }}</td>
                        <td>{{ $sindico->celular }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('condominios.sindicos.exibir', ['id' => $sindico->id ]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection
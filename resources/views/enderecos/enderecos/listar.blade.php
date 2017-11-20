@extends('layouts.app')
@section('titulo', 'Endereços - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de endereços">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('enderecos.enderecos.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Logradouro</th>
                    <th>Numero</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($enderecos as $endereco)
                    <tr>
                        <td>{{ $endereco->id }}</td>
                        <td>{{ $endereco->logradouro }}</td>
                        <td>{{ $endereco->numero }}</td>
                        <td>{{ $endereco->cep }}</td>
                        <td>{{ $endereco->cidade->descricao }} - {{ $endereco->cidade->estado->sigla }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('enderecos.enderecos.exibir', ['id' => $endereco->id ]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

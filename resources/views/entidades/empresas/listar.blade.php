@extends('layouts.app')
@section('titulo', 'Empresas - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de empresas">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('entidades.empresas.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Fantasia</th>
                    <th>Código</th>
                    <th>Razão social</th>
                    <th>Logo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->entidade->fantasia }}</td>
                        <td>{{ $empresa->codigo }}</td>
                        <td>{{ $empresa->razao_social }}</td>
                        <td><img src="{{ Storage::url($empresa->logo) }}" alt="Logo" width="90px" height="50px"></td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('entidades.empresas.exibir', ['id' => $empresa->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

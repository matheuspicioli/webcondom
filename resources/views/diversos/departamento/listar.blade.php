@extends('layouts.app')
@section('titulo', 'Departamentos - Lista')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Lista de Departamentos">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('diversos.departamento.criar') }}" class="btn btn-primary">Cadastrar</a>
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
                @foreach($departamento as $departamentos)
                    <tr>
                        <td>{{ $departamentos->id }}</td>
                        <td>{{ $departamentos->Descricao }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('diversos.departamento.exibir', ['id' => $departamentos->id]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection

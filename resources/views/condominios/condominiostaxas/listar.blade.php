@extends('layouts.app')
@section('titulo', 'Taxa de condomínios - Lista')
@section('conteudo')
    <pagina tamanho="12">
        <painel cor="panel-primary" titulo="Lista de taxa de condomínios">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('condominios.condominiostaxas.criar', ['idCondominio' => $idCondominio]) }}"
               class="btn btn-primary">Cadastrar</a>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($taxas as $taxa)
                    <tr>
                        <td>{{ $taxa->id }}</td>
                        <td>{{ $taxa->descricao }}</td>
                        <td>{{ $taxa->valor }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('condominios.condominiostaxas.exibir', ['id' => $taxa->id, 'idCondominio' => $idCondominio ]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection
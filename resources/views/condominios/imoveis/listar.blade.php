@extends('layouts.app')
@section('titulo', 'Imóveis - Lista')
@section('conteudo')
    <pagina tamanho="12">
        <painel titulo="Lista de imóveis" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <a href="{{ route('condominios.imoveis.criar') }}" class="btn btn-primary">Cadastrar</a>
            <hr/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Referência</th>
                    <th>Condomínio</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($imoveis as $imovel)
                    <tr>
                        <td>{{ $imovel->id }}</td>
                        <td>{{ $imovel->codigo }}</td>
                        <td>{{ $imovel->referencia }}</td>
                        <td>{{ $imovel->condominio->nome }}</td>
                        <td>{{ $imovel->categoria->descricao }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('condominios.imoveis.exibir', ['id' => $imovel->id ]) }}">Alterar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection
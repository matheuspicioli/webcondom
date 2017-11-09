@extends('layouts.app')
@section('titulo', 'Taxa de condomínios - Lista')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Lista de taxa de condomínios</h3>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('condominios.condominiostaxas.criar') }}" class="btn btn-primary">Cadastrar</a>
                        <hr />
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
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('condominios.condominiostaxas.exibir', ['id' => $taxa->id ]) }}">Alterar</a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
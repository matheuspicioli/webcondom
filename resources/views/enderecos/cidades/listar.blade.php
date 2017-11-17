@extends('layouts.app')
@section('titulo', 'Cidades - Lista')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Lista de cidades</h3>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('enderecos.cidades.criar') }}" class="btn btn-primary">Cadastrar</a>
                        <a href="{{ route('home') }}" class="btn btn-default" >Voltar</a>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>CodigoIBGE</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cidades as $cidade)
                                    <tr>
                                        <td>{{ $cidade->id }}</td>
                                        <td>{{ $cidade->descricao }}</td>
                                        <td>{{ $cidade->codigo_ibge ? $cidade->codigo_ibge : 'Vázio' }}</td>
                                        <td>{{ $cidade->estado->descricao }}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('enderecos.cidades.exibir', ['id' => $cidade->id]) }}">Alterar</a>
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
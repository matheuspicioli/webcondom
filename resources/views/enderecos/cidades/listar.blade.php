@extends('layouts.app')
@section('titulo', 'Cidades - Lista de cidades')
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
                                        <td>{{ $cidade->CidadeID }}</td>
                                        <td>{{ $cidade->Descricao }}</td>
                                        <td>{{ $cidade->CodigoIBGE ? $cidade->CodigoIBGE : 'Vázio' }}</td>
                                        <td>{{ $cidade->Estado->Descricao }}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('enderecos.cidades.exibir', ['id' => $cidade->CidadeID]) }}">Alterar</a>
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
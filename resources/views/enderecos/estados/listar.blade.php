@extends('layouts.app')
@section('titulo', 'Estados - Lista')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Lista de estados</h3>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('enderecos.estados.criar') }}" class="btn btn-primary">Cadastrar</a>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Sigla</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estados as $estado)
                                    <tr>
                                        <td>{{ $estado->EstadoID }}</td>
                                        <td>{{ $estado->Descricao }}</td>
                                        <td>{{ $estado->Sigla }}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('enderecos.estados.exibir', ['id' => $estado->EstadoID]) }}">Alterar</a>
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
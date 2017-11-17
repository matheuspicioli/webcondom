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
                        <a href="{{ route('home') }}" class="btn btn-default" >Voltar</a>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Sigla</th>
                                    <th>Código IBGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estados as $estado)
                                    <tr>
                                        <td>{{ $estado->id }}</td>
                                        <td>{{ $estado->descricao }}</td>
                                        <td>{{ $estado->sigla }}</td>
                                        <td>{{ $estado->codigo_ibge }}</td>
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

@extends('layouts.app')
@section('titulo', 'Estado Civil - Lista')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Lista de Estado Civis</h3>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('diversos.estadoCivil.criar') }}" class="btn btn-primary">Cadastrar</a>
                        <a href="{{ route('home') }}" class="btn btn-default" >Voltar</a>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estadoCivil as $estadosCivis)
                                    <tr>
                                        <td>{{ $estadosCivis->id }}</td>
                                        <td>{{ $estadosCivis->Descricao }}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('diversos.estadoCivil.exibir', ['id' => $estadosCivis->id]) }}">Alterar</a>
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

@extends('layouts.app')
@section('titulo', 'Sindicos - Lista')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Lista de sindicos</h3>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('condominios.sindicos.criar') }}" class="btn btn-primary">Cadastrar</a>
                        <a href="{{ route('home') }}" class="btn btn-default" >Voltar</a>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Celular</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sindicos as $sindico)
                                    <tr>
                                        <td>{{ $sindico->id }}</td>
                                        <td>{{ $sindico->nome }}</td>
                                        <td>{{ $sindico->telefone ? $sindico->telefone : 'Vázio' }}</td>
                                        <td>{{ $sindico->celular }}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('condominios.sindicos.exibir', ['id' => $sindico->id ]) }}">Alterar</a>
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
@extends('layouts.app')
@section('titulo', 'Condomínios - Lista')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Lista de condomínios</h3>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('condominios.condominios.criar') }}" class="btn btn-primary">Cadastrar</a>
                        <a href="{{ route('home') }}" class="btn btn-default" >Voltar</a>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Apelido</th>
                                    <th>Unidades</th>
                                    <th>Tipo de juros</th>
                                    <th>Endereço</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($condominios as $condominio)
                                    <tr>
                                        <td>{{ $condominio->id }}</td>
                                        <td>{{ $condominio->nome }}</td>
                                        <td>{{ $condominio->apelido }}</td>
                                        <td>{{ $condominio->unidades }}</td>
                                        <td>{{ $condominio->tipo_juros_formatado }}</td>
                                        <td>{{ $condominio->endereco->endereco_formatado }}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('condominios.condominios.exibir', ['id' => $condominio->id ]) }}">Alterar</a>
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
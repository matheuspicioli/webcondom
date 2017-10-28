@extends('layouts.app')
@section('titulo', 'Endereços - Lista')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Lista de endereços</h3>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('enderecos.enderecos.criar') }}" class="btn btn-primary">Cadastrar</a>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rua</th>
                                    <th>Numero</th>
                                    <th>CEP</th>
                                    <th>Cidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enderecos as $endereco)
                                    <tr>
                                        <td>{{ $endereco->EnderecoID }}</td>
                                        <td>{{ $endereco->Rua }}</td>
                                        <td>{{ $endereco->Numero }}</td>
                                        <td>{{ $endereco->CEP }}</td>
                                        <td>{{ $endereco->Cidade->Descricao }} - {{ $endereco->Cidade->Estado->Sigla }}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a style="color: #FFFFFF"
                                                        href="{{ route('enderecos.enderecos.exibir', ['id' => $endereco->EnderecoID ]) }}">Alterar</a>
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
@extends('adminlte::page')
@section('titulo', 'Proprietários - Lista')
@section('content_header')
    <h1>Proprietários - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Proprietários
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('entidades.proprietarios.criar') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cadastrar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Proprietários</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>CPF/CNPJ</th>
                            <th>Código</th>
                            <th>Ações</th>
                        </tr>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>CPF/CNPJ</th>
                            <th>Código</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($proprietarios as $proprietario)
                            <tr>
                                <td>{{ $proprietario->id }}</td>
                                <td>{{ $proprietario->entidade->nome }}</td>
                                <td>{{ $proprietario->entidade->apelido }}</td>
                                <td>{{ $proprietario->entidade->cpf_cnpj }}</td>
                                <td>{{ $proprietario->codigo }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('entidades.proprietarios.exibir', ['id' => $proprietario->id ]) }}">
                                        <i class="fa fa-pencil"></i> Alterar</a>
                                    <button type="button" data-toggle="modal" data-target="#modal-danger-{{$proprietario->id}}" href="#" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                    <!-- MODAL EXCLUSÃO -->
                                    <div id="modal-danger-{{$proprietario->id}}" class="modal modal-danger fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h3 class="modal-title">Confirmar exclusão</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Deseja realmente excluir o proprietário "{{ $proprietario->nome }}"?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                    <form method="POST" action="{{ route('entidades.proprietarios.excluir', ['id' => $proprietario->id]) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#tabela').DataTable()
        });
    </script>
@stop

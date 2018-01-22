@extends('adminlte::page')
@section('title', 'Contas corrente - Listar')
@section('content_header')
    <h1>Contas corrente - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-group"></i> Contas corrente
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.contascorrente.criar') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cadastrar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Grupo de contas</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Banco</th>
                            <th>Conta</th>
                            <th>Agencia</th>
                            <th>Nosso número (boleto)</th>
                            <th>Alterado em</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Banco</th>
                            <th>Conta</th>
                            <th>Agencia</th>
                            <th>Nosso número (boleto)</th>
                            <th>Alterado em</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($contas->dados as $conta)
                            <tr>
                                <td>{{ $conta->id }}</td>
                                <td>{{ $conta->banco ? $conta->banco->nome_banco : 'O registro pai foi excluído' }}</td>
                                <td>{{ $conta->conta }}</td>
                                <td>{{ $conta->agencia }}</td>
                                <td>{{ $conta->nosso_numero }}</td>
                                <td>{{ $conta->alterado_em }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('financeiros.contascorrente.exibir', ['id' => $conta->id ]) }}">
                                        <i class="fa fa-pencil"></i> Alterar</a>
                                    <button type="button" data-toggle="modal" data-target="#modal-danger-{{$conta->id}}" href="#" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                    <!-- MODAL EXCLUSÃO -->
                                    <div id="modal-danger-{{$conta->id}}" class="modal modal-danger fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                       </button>
                                                    <h3 class="modal-title">Confirmar exclusão</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Dados da exclusão: </h2>
                                                    <p>Conta:   {{ $conta->conta }}</p>
                                                    <p>Agência: {{ $conta->agencia }}</p>
                                                    <p>Banco:   {{ $conta->banco ? $conta->banco->nome_banco : 'Registro pai foi excluído.' }}</p>
                                                    <p>Nosso número (boleto): {{ $conta->nosso_numero }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                    <form method="POST" action="{{ route('financeiros.contascorrente.excluir', ['id' => $conta->id]) }}">
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
@extends('adminlte::page')
@section('title', 'Contas corrente - Listar')
@section('content_header')
    <h1>Contas Correntes - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-group"></i> Conta Corrente
        </li>
    </ol>
@stop
@section('content')
    @can("listar_contacorrente")
        <div class="row">
            <div class="col-md-1">
                @can("incluir_contacorrente")
                    <a href="{{ route('financeiros.contascorrente.criar') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Cadastrar</a>
                @else
                    <button disabled type="button" class="btn btn-success">
                        <i class="fa fa-plus"></i> Cadastrar</button>
                @endcan
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Conta Corrente</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Condomínio</th>
                                <th>Código</th>
                                <th>Nome do Correntista</th>
                                <th>Agencia</th>
                                <th>Conta</th>
                                <th>Banco</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Condomínio</th>
                                <th>Código</th>
                                <th>Nome do Correntista</th>
                                <th>Agencia</th>
                                <th>Conta</th>
                                <th>Banco</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($contas->dados as $conta)
                                <tr>
                                    <td>{{ $conta->id }}</td>
                                    <td>{{ $conta->condominio_id }}</td>
                                    <td>{{ $conta->codigo }}</td>
                                    <td>{{ $conta->nome }}</td>
                                    <td>{{ $conta->agencia }}</td>
                                    <td>{{ $conta->conta }}</td>
                                    <td>{{ $conta->banco ? $conta->banco->nome_banco : 'O registro pai foi excluído' }}</td>
                                    <td>
                                        @can("exibir_contacorrente")
                                            <a class="btn btn-xs btn-warning" href="{{ route('financeiros.contascorrente.exibir', ['id' => $conta->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("exibir_contacorrentelancamento")
                                            <a href="{{ route('financeiros.lancamentos.listar',['conta_id'=>$conta->id, 'dias' => 7]) }}" class="btn btn-xs btn-success" title="Lançamentos">
                                                <i class="fa fa-th-list"></i></a>
                                        @else
											<button disabled type="button" class="btn btn-xs btn-success">
                                            	<i class="fa fa-th-list"></i>
											</button>
                                        @endcan
                                        @can("deletar_contacorrente")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$conta->id}}" href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
											</button>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
											</button>
                                        @endcan
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
                                                        <h3>Dados da exclusão: </h3>
                                                        <p>Conta:   {{ $conta->conta }}</p>
                                                        <p>Agência: {{ $conta->agencia }}</p>
                                                        <p>Banco:   {{ $conta->banco->nome_banco }}</p>
                                                        <p>Nome:   {{ $conta->nome }}</p>
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
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{mensagem_permissao()}}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@stop

@section('js')
    <script>
        $(function () {
            $('#tabela').DataTable({
                "order": [[1,"asc"],[2,"asc"]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
@stop
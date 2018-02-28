@extends('adminlte::page')
@section('title', 'Bancos - Listar')
@section('content_header')
    <h1>Bancos - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Bancos
        </li>
    </ol>
@stop

@section('content')
    @can("listar_banco")
        <div class="row">
            <div class="col-md-1">
                @can("incluir_banco")
                    <a href="{{ route('financeiros.bancos.criar') }}" class="btn btn-success">
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
                        <h3 class="box-title">Bancos</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Padrão</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Padrão</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($bancos as $banco)
                                <tr>
                                    <td>{{ $banco->codigo_banco }}</td>
                                    <td>{{ $banco->CNAB }}</td>
                                    <td>{{ $banco->nome_banco }}</td>
                                    <td>
                                        @can("exibir_banco")
                                            <a class="btn btn-sm btn-warning" href="{{ route('financeiros.bancos.exibir', ['id' => $banco->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-sm btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("deletar_banco")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$banco->id}}" href="#" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" data-toggle="modal" data-target="#modal-danger-{{$banco->id}}" href="#" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan
                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$banco->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                           </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja realmente excluir o banco "{{ $banco->nome_banco }}" no padrão CNAB "{{ $banco->CNAB }}"?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('financeiros.bancos.excluir', ['id' => $banco->id]) }}">
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
                "order": [[2, "asc"],[1, "asc"]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
@stop
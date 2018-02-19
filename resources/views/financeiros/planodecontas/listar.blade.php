@extends('adminlte::page')
@section('title', 'Plano de contas - Listar')
@section('content_header')
    <h1>Plano de contas - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-group"></i> Plano de contas
        </li>
    </ol>
@stop

@section('content')
    <!--<div class="fa fa-spinner fa-spin" id="carregando"></div>-->
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.planodecontas.criar') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cadastrar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar plano de contas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    {!! Form::open(['route' => ['financeiros.planodecontas.salvar'], 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('tipo', 'Tipo', ['class' => 'control-label']) !!}
                                {!! Form::select('tipo', [1 => '1 - RECEITAS', 2 => '2 - DESPESAS', 3 => '3 - TRANSFERÊNCIAS'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {!! Form::label('grupo', 'Grupo', ['class' => 'control-label']) !!}
                                {!! Form::text('grupo', '', ['class' => 'form-control', 'maxlength' => '3']) !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {!! Form::label('conta', 'Conta', ['class' => 'control-label']) !!}
                                {!! Form::text('conta', '', ['class' => 'form-control', 'maxlength' => '4']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            {!! Form::label('ratear', 'Ratear?', ['class' => 'control-label']) !!}
                            {!! Form::select('ratear', ['Sim' => 'Sim', 'Nao' => 'Não'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('descricao', 'Descrição', ['class' => 'control-label']) !!}
                                {!! Form::text('descricao', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Planos de contas</h3>
                    <div class="pull-right">
                        <a class="btn btn-xs btn-success" href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'xlsx']) }}">
                            <i class="fa fa-file-excel-o"></i>
                        </a>
                        <a class="btn btn-xs btn-success" href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'csv']) }}">
                            CSV
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Grupo</th>
                            <th>Conta</th>
                            <th>Criado em</th>
                            <th>Alterado em</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Descrição</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Grupo</th>
                            <th>Conta</th>
                            <th>Criado em</th>
                            <th>Alterado em</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($planos as $plano)
                            @foreach($plano->grupos as $grupo)
                                @foreach($grupo->contas as $conta)
                                    <tr>
                                        <td>{{ $conta->descricao }}</td>
                                        <td>{{ "$plano->tipo.$grupo->grupo.$conta->conta" }}</td>
                                        <td>{{ $plano->tipo }}</td>
                                        <td>{{ $grupo->grupo }}</td>
                                        <td>{{ $conta->conta }}</td>
                                        <td>{{ $conta->criado_em }}</td>
                                        <td>{{ $conta->alterado_em }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-warning" href="
                                        {{ route('financeiros.planodecontas.exibir',['plano' => $plano->id,'grupo' => $grupo->id, 'conta' => $conta->id]) }}
                                                    ">
                                                <i class="fa fa-pencil"></i></a>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$plano->id}}" href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <!-- MODAL EXCLUSÃO -->
                                            <div id="modal-danger-{{$plano->id}}" class="modal modal-danger fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h3 class="modal-title">Confirmar exclusão</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Deseja realmente excluir o plano de contas "{{ $plano->descricao }}"?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                            <form method="POST" action="{{ route('financeiros.planodecontas.excluir', ['id' => $plano->id]) }}">
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
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-erro" class="modal modal-danger fade" data-toggle="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="modal-title">Erro ao consultar grupo</h3>
                </div>
                <div class="modal-body">
                    <h4 id="mensagem-erro"></h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" id="botao-fechar-modal-erro" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#tabela').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
    <script src="{{ asset('js/ajax/financeiros/planodecontas/consulta.js') }}"></script>
@stop
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
                    {!! Form::open(['route' => ['financeiros.planodecontas.salvar'], 'method' => 'POST', 'id' => 'form-plano-contas']) !!}
                    <div class="row">
                        <div class="col-md-12 col-md-offset-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('tipo', 'Tipo', ['class' => 'control-label']) !!}
                                    <select name="tipo_id" id="tipo" class="form-control">
                                        @foreach($tipos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }} - {{ $tipo->descricao }}</option>
                                        @endforeach
                                    </select>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('descricao_grupo', 'Descrição grupo', ['class' => 'control-label']) !!}
                                {!! Form::text('descricao_grupo', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('descricao_conta', 'Descrição conta', ['class' => 'control-label']) !!}
                                {!! Form::text('descricao_conta', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary" id="enviar-plano-contas" type="button">Cadastrar</button>
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
                    <h3 class="box-title">Listagem plano de contas</h3>
                    <div class="pull-right">
                        <a class="btn btn-xs btn-success" href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'xlsx']) }}">
                            <i class="fa fa-file-excel-o"></i>
                        </a>
                        <a class="btn btn-xs btn-success" href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'csv']) }}">
                            CSV
                        </a>
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>Descrição grupo</th>
                            <th>Descrição conta</th>
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
                            <th>Descrição grupo</th>
                            <th>Descrição conta</th>
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
                        @foreach($tipos as $tipo)
                            @foreach($tipo->grupos as $grupo)
                                @foreach($grupo->contas as $conta)
                                    <tr>
                                        <td>{{ $grupo->descricao }}</td>
                                        <td>{{ $conta->descricao }}</td>
                                        <td>{{ "$tipo->tipo.$grupo->grupo.$conta->conta" }}</td>
                                        <td>{{ $tipo->tipo }}</td>
                                        <td>{{ $grupo->grupo }}</td>
                                        <td>{{ $conta->conta }}</td>
                                        <td>{{ $grupo->criado_em }}</td>
                                        <td>{{ $grupo->alterado_em }}</td>
                                        <td>
                                            <a href="{{ route('financeiros.planodecontas.exibir', ['tipo' => $tipo->id, 'grupo' => $grupo->id, 'conta' => $conta->id]) }}"
                                               class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i>
                                            </a>
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
                    <h3 class="modal-title">Erro</h3>
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
            $('#tipo').focus();
            $('#tabela').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            });

            $('#enviar-plano-contas').click(function(){
                if($('#grupo').val() == '') {
                    $('#modal-erro').modal('show');
                    $('#mensagem-erro').text('O campo grupo não foi informado');
                }
                else
                    $('#form-plano-contas').submit();
            });
        });
    </script>
    <script src="{{ asset('js/ajax/financeiros/planodecontas/consulta.js') }}"></script>
@stop
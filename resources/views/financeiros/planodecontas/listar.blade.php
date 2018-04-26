@extends('adminlte::page')
@section('title', 'Plano de contas - Listar')
@section('content_header')
    <h1>Plano de contas -
        <small>listagem</small>
    </h1>
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
    @can("listar_planodeconta")
        <!--<div class="fa fa-spinner fa-spin" id="carregando"></div>-->
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
                                        <select name="plano_id" id="tipo" class="form-control">
                                            <option disabled selected>---------------SELECIONE---------------</option>
                                            @foreach($planos as $plano)
                                                <option value="{{ $plano->id }}">{{ $plano->tipo }}
                                                    - {{ $plano->descricao }}</option>
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
                                    <button class="btn btn-primary" id="enviar-plano-contas" type="submit">
                                        <i class="fa fa-save"></i> Incluir
                                    </button>
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
                            <a class="btn btn-xs btn-success"
                               href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'xlsx']) }}">
                                <i class="fa fa-file-excel-o"></i>
                            </a>
                            <a class="btn btn-xs btn-success"
                               href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'csv']) }}">
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
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Grupo</th>
                                <th>Conta</th>
                                <th>Ratear</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Grupo</th>
                                <th>Conta</th>
                                <th>Ratear</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($planos as $plano)
                                @foreach($plano->grupos as $grupo)
                                    <tr>
                                        <td><b>{{ "$plano->tipo.$grupo->grupo" }}</b></td>
                                        <td><b>{{ $grupo->descricao }}</b></td>
                                        <td><b>{{ $plano->tipo}} - {{$plano->descricao }}</b></td>
                                        <td><b>{{ $grupo->grupo }}</b></td>
                                        <td></td>
                                        <td><b>{{ $grupo->ratear}}</b></td>
                                        <td>
                                            @can("exibir_planodeconta")
                                                <a href="{{ route('financeiros.planodecontas.exibirgrupo', ['plano' => $plano->id, 'grupo' => $grupo->id]) }}"
                                                   class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @else
                                                <button disabled type="button" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i></button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            @foreach($planos as $plano)
                                @foreach($plano->grupos as $grupo)
                                    @foreach($grupo->contas as $conta)
                                        <tr>
                                            <td>{{ "$plano->tipo.$grupo->grupo.$conta->conta" }}</td>
                                            <td><li>{{ $conta->descricao }}</li></td>
                                            <td>{{ $plano->tipo}} - {{$plano->descricao }}</td>
                                            <td>{{ $grupo->grupo }}</td>
                                            <td>{{ $conta->conta }}</td>
                                            <td></td>
                                            <td>
                                                @can("exibir_planodeconta")
                                                    <a href="{{ route('financeiros.planodecontas.exibir', ['plano' => $plano->id, 'grupo' => $grupo->id, 'conta' => $conta->id]) }}"
                                                       class="btn btn-xs btn-warning">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                @else
                                                    <button disabled type="button" class="btn btn-xs btn-warning">
                                                        <i class="fa fa-pencil"></i></button>
                                                @endcan
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
                        <button class="btn btn-outline pull-left" type="button" id="botao-fechar-modal-erro"
                                data-dismiss="modal">Fechar
                        </button>
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
        $(document).ready(function () {
            $('#tabela').DataTable({
                "order": [[2,"asc"],[3,"asc"],[4,"asc"]],
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            });
            $('#conta').attr('disabled', true);
            $('#grupo').attr('disabled', true);
            $('#descricao_grupo').attr('disabled', true);
            $('#descricao_conta').attr('disabled', true);
            $('#ratear').attr('disabled', true);

            $('#tipo').change(function () {
                $('#grupo').attr('disabled', false);
                $('#grupo').focus();
                $('#descricao_conta').attr('disabled', true);
            });

            $('#conta').blur(function () {
                if ($('#conta').val() == '') {
                    $('#conta').attr('disabled', true);
                    $('#descricao_grupo').attr('disabled', true);
                    $('#descricao_conta').attr('disabled', false);
                    $('#descricao_conta').focus();
                }
            });

            $('#grupo').blur(function () {
                if ($('#conta').val() == '') {
                    $('#conta').attr('disabled', true);
                }
                if ($('#grupo').val() != '') {
                    $('#descricao_grupo').attr('disabled', true);
                    $('#descricao_conta').attr('disabled', false);
                    $('#descricao_conta').focus();
                } else {
                    $('#ratear').attr('disabled', false);
                    $('#descricao_grupo').attr('disabled', false);
                    $('#ratear').focus();
                }
            });
        });
    </script>
    <script src="{{ asset('js/ajax/financeiros/planodecontas/consulta.js') }}"></script>
@stop
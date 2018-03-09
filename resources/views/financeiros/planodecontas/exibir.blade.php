@extends('adminlte::page')
@section('title', 'Plano de contas - Editar')
@section('content_header')
    <h1>Plano de contas -
        <small>edição</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.planodecontas.listar') }}"><i class="fa fa-home"></i> Plano de contas</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Plano de contas
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.planodecontas.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("exibir_planodeconta")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar plano de contas</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('financeiros.planodecontas.alterar', ['plano' => $plano->id, 'grupo' => $grupo->id, 'conta' => $conta->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('plano', 'Tipo', ['class' => 'control-label']) !!}
                                            @if(!$conta->conta && !$conta->descricao)
                                                <select name="tipo_id" id="plano" class="form-control">
                                                    @foreach($planos as $planoF)
                                                        <option {{$planoF->id == $plano->id ? 'selected' : '' }} value="{{ $planoF->id }}">{{ $planoF->tipo }}
                                                            - {{ $planoF->descricao }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select name="plano_id" id="plano" class="form-control" disabled="disabled">
                                                    @foreach($planos as $planoF)
                                                        <option {{$planoF->id == $plano->id ? 'selected' : '' }} value="{{ $planoF->id }}">{{ $planoF->tipo }}
                                                            - {{ $planoF->descricao }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            {!! Form::label('grupo', 'Grupo', ['class' => 'control-label']) !!}
                                            @if(!$conta->conta && !$conta->descricao)
                                                {!! Form::text('grupo', $grupo->grupo, ['class' => 'form-control', 'maxlength' => '3', 'disabled']) !!}
                                            @else
                                                {!! Form::text('grupo', $grupo->grupo, ['class' => 'form-control', 'maxlength' => '3', 'disabled']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            {!! Form::label('conta', 'Conta', ['class' => 'control-label']) !!}
                                            @if($conta->conta && $conta->descricao)
                                                {!! Form::text('conta', $conta->conta, ['class' => 'form-control', 'maxlength' => '4', 'disabled']) !!}
                                            @else
                                                {!! Form::text('conta', $conta->conta, ['class' => 'form-control', 'maxlength' => '4', 'disabled']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::label('ratear', 'Ratear?', ['class' => 'control-label']) !!}
                                        @if(!$conta->conta && !$conta->descricao)
                                            <select name="ratear" id="ratear" class="form-control" >
                                                <option {{$grupo->ratear == 'Sim' ? 'selected' : '' }} value="Sim">
                                                    Sim
                                                </option>
                                                <option {{$grupo->ratear == 'Não' ? 'selected' : '' }} value="Não">
                                                    Não
                                                </option>
                                            </select>
                                        @else
                                            <select name="ratear" id="ratear" class="form-control" disabled="disabled">
                                                <option {{$grupo->ratear == 'Sim' ? 'selected' : '' }} value="Sim">
                                                    Sim
                                                </option>
                                                <option {{$grupo->ratear == 'Não' ? 'selected' : '' }} value="Não">
                                                    Não
                                                </option>
                                            </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('descricao_grupo', 'Descrição grupo', ['class' => 'control-label']) !!}
                                        @if(!$conta->conta && !$conta->descricao)
                                            {!! Form::text('descricao_grupo', $grupo->descricao, ['class' => 'form-control']) !!}
                                        @else
                                            {!! Form::text('descricao_grupo', $grupo->descricao, ['class' => 'form-control','disabled']) !!}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('descricao_conta', 'Descrição conta', ['class' => 'control-label']) !!}
                                        @if(!$conta->conta && !$conta->descricao)
                                            {!! Form::text('descricao_conta', $conta->descricao, ['class' => 'form-control','disabled']) !!}
                                        @else
                                            {!! Form::text('descricao_conta', $conta->descricao, ['class' => 'form-control']) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_planodeconta")
                                            <button class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @endcan
                                        @can("deletar_planodeconta")
                                            <button class="btn btn-danger" type="button" data-toggle="modal"
                                                    data-target="#modal-excluir-conta">
                                                <i class="fa fa-trash"></i> Excluir conta</button>
                                        @else
                                            <button disabled class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                                <i class="fa fa-trash"></i> Excluir conta</button>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL EXCLUIR GRUPO -->
        <div id="modal-excluir-grupo" class="modal modal-danger fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="modal-title">Confirmar exclusão</h3>
                    </div>
                    <div class="modal-body">
                        <h4>Deseja realmente excluir o grupo? Todas as contas cadastradas nele também serão excluídas.</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST"
                              action="{{ route('financeiros.planodecontas.excluirgrupo', ['id' => $grupo->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL EXCLUIR CONTA -->
        <div id="modal-excluir-conta" class="modal modal-danger fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="modal-title">Confirmar exclusão</h3>
                    </div>
                    <div class="modal-body">
                        <h4>Deseja realmente excluir a conta "{{$conta->descricao}}"?</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST"
                              action="{{ route('financeiros.planodecontas.excluirconta', ['id' => $conta->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                        </form>
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
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#plano').focus();
            $('#grupo').blur(function () {
                plano = $('#plano').val();
                grupo = $('#grupo').val();
                $.ajax({
                    url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximaConta/" + plano + '/' + grupo,
                    type: "GET"
                }).done(function (retorno) {
                    $('#conta').val(retorno);
                    if ($('#conta').val() == '') {
                        $('#conta').val('0001');
                    }
                }).fail(function (xhr, status, retorno) {
                    console.log("Erro ao consultar próxima conta (blur grupo). " + retorno);
                });
            });
        });
    </script>
@endsection
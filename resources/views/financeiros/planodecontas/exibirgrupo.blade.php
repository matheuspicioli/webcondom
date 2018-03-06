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
                    <form action="{{ route('financeiros.planodecontas.alterar', ['tipo' => $tipo->id, 'grupo' => $grupo->id]) }}"
                          method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('tipo', 'Tipo', ['class' => 'control-label']) !!}
                                            <select name="tipo_id" id="tipo" class="form-control">
                                                @foreach($tipos as $tipoF)
                                                    <option {{$tipoF->id == $tipo->id ? 'selected' : '' }} value="{{ $tipoF->id }}">{{ $tipoF->tipo }}
                                                        - {{ $tipoF->descricao }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        {!! Form::label('grupo', 'Grupo', ['class' => 'control-label']) !!}
                                            {!! Form::text('grupo', $grupo->grupo, ['class' => 'form-control', 'maxlength' => '3', 'disabled']) !!}
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        {!! Form::label('conta', 'Conta', ['class' => 'control-label']) !!}

                                            {!! Form::text('conta', '', ['class' => 'form-control', 'maxlength' => '4', 'disabled']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    {!! Form::label('ratear', 'Ratear?', ['class' => 'control-label']) !!}
                                    <select name="ratear" id="ratear" class="form-control" >
                                        <option {{$grupo->ratear == 'Sim' ? 'selected' : '' }} value="Sim">
                                            Sim
                                        </option>
                                        <option {{$grupo->ratear == 'Não' ? 'selected' : '' }} value="Não">
                                            Não
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('descricao_grupo', 'Descrição grupo', ['class' => 'control-label']) !!}
                                    {!! Form::text('descricao_grupo', $grupo->descricao, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('descricao_conta', 'Descrição conta', ['class' => 'control-label']) !!}
                                    {!! Form::text('descricao_conta', '', ['class' => 'form-control','disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-pencil"></i> Alterar
                                    </button>
                                </div>
                            </div>
                        </div>
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
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#tipo').focus();
            $('#tipo').attr('disabled', true);
            // $('#grupo').blur(function () {
            //     tipo = $('#tipo').val();
            //     grupo = $('#grupo').val();
            //     $.ajax({
            //         url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximaConta/" + tipo + '/' + grupo,
            //         type: "GET"
            //     }).done(function (retorno) {
            //         $('#conta').val(retorno);
            //         if ($('#conta').val() == '') {
            //             $('#conta').val('0001');
            //         }
            //     }).fail(function (xhr, status, retorno) {
            //         console.log("Erro ao consultar próxima conta (blur grupo). " + retorno);
            //     });
            // });
        });
    </script>
@endsection
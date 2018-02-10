@extends('adminlte::page')
@section('title', 'Plano de contas - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de plano de contas</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.planodecontas.listar') }}"><i class="fa fa-group"></i> Plano de contas</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar plano de contas
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
                    <h3 class="box-title">Cadastrar plano de contas</h3>
                </div>

                <div class="box-body">
                    {!! Form::open(['route' => ['financeiros.planodecontas.salvar'], 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    {!! Form::label('tipo', 'Tipo', ['class' => 'control-label']) !!}
                                    {!! Form::select('tipo', [1 => '1', 2 => '2', 3 => '3'], null, ['class' => 'form-control']) !!}
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
                            <div class="col-md-7">
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
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $("#descricao").focus();
        });
    </script>
@stop
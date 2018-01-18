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
                    <form action="{{ route('financeiros.planodecontas.salvar') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="descricao" class="control-label">Descrição</label>
                                    <input id="descricao" type="text" class="form-control pula" name="descricao">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="classificacao" class="control-label">Classificação</label>
                                    <input id="classificacao" type="text" class="form-control pula" name="classificacao">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="tipo" class="control-label">Tipo</label>
                                    <select name="tipo" class="form-control select2" id="tipo">
                                        <option value="Receita">Receita</option>
                                        <option value="Despesa">Despesa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria" class="control-label">Categoria</label>
                                    <select name="categoria" class="form-control select2" id="categoria">
                                        <option value="Ativo">Ativo</option>
                                        <option value="Passivo">Passivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="grupo" class="control-label">Grupo de conta</label>
                                    <select name="grupo_contas_id" class="form-control select2" id="grupo">
                                        @foreach($grupos as $grupo)
                                            <option value="{{ $grupo->id }}">{{ $grupo->descricao }}</option>
                                        @endforeach
                                    </select>
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
                    </form>
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
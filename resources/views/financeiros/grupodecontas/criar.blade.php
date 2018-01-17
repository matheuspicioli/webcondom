@extends('adminlte::page')
@section('title', 'Grupo de contas - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de grupo de contas</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.grupodecontas.listar') }}"><i class="fa fa-group"></i> Grupo de contas</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar grupo de contas
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.grupodecontas.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar grupo de contas</h3>
                </div>

                <div class="box-body">
                    <form action="{{ route('financeiros.grupodecontas.salvar') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="descricao" class="control-label">Descricao</label>
                                    <input id="descricao" type="text" class="form-control pula" name="descricao">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="ratear" class="control-label">Ratear?</label>
                                    <select name="ratear" class="form-control select2" id="ratear">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
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
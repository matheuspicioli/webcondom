@extends('adminlte::page')
@section('title', 'Condominios - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de condomínios</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.condominios.listar') }}"><i class="fa fa-home"></i> Condomínios</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar condomínio
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.condominios.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar condomínio</h3>
                </div>

                <div class="box-body">
                    <form action="{{ route('financeiros.grupodecontas.salvar') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nome" class="control-label">Descricao</label>
                                    <input id="Nome" type="text" class="form-control pula" name="descricao">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ratear" class="control-label">Ratear?</label>
                                    <select name="ratear" class="form-control" id="ratear">
                                        <option value="1">Sim</option>
                                        <option value="-">Não</option>
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
            $("#Nome").focus();
        });
    </script>
@stop
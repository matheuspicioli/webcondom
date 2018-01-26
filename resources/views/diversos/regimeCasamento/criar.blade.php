@extends('adminlte::page')
@section('titulo', 'Regime de Casamento - Criar')
@section('content_header')
    <h1>Cadastro <small>de REgime de Casamento</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.regimeCasamento.listar') }}"><i class="fa fa-home"></i> Regime de Casamento</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar regime de casamento
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('diversos.regimeCasamento.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar regime de casamento</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('diversos.regimeCasamento.salvar') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-save"></i> Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div:
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#Descricao').focus();
        });
    </script>
@stop
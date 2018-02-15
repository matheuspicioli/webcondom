@extends('adminlte::page')
@section('title', 'Setores - Criar')
@section('content_header')
    <h1>Cadastro <small>de Setores</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.setores.listar') }}"><i class="fa fa-home"></i> Setores</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar setor
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('diversos.setores.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_setor")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar setor</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('diversos.setores.salvar') }}" method="POST">
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
            $('#Descricao').focus();
        });
    </script>
@stop
@extends('adminlte::page')
@section('title', 'Departamentos - Criar')
@section('content_header')
    <h1>Cadastro <small>de Departamentos</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.departamento.listar') }}"><i class="fa fa-home"></i> Departamentos</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar departamento
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('diversos.departamento.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_departamento")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar departamento</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('diversos.departamento.salvar') }}" method="POST">
                            {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="Descricao" class="control-label"
                                           @if($errors->has('descricao')) style="color: #f56954" @endif>Descrição</label>
                                    <input type="text" name="descricao" id="Descricao" class="form-control pula"
                                           @if($errors->has('descricao')) style="border:1px solid #f56954" @endif
                                           value="{{ old('descricao') ? old('descricao') : '' }}">
                                    @if( $errors->has('descricao') )
                                        <span style="color: #f56954">{{ $errors->get('descricao')[0] }}</span>
                                    @endif
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
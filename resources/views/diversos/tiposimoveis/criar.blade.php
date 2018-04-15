@extends('adminlte::page')
@section('titulo', 'Tipos de Imóveis - Criar')
@section('content_header')
    <h1>Cadastro <small>de Tipos de Imóveis</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.tiposimoveis.listar') }}"><i class="fa fa-home"></i> Tipos de Imóveis</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar tipo de imóvel
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('diversos.tiposimoveis.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar tipo de imóvel</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('diversos.tiposimoveis.salvar') }}" method="POST">
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
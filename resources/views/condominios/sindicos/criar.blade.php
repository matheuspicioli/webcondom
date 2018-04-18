@extends('adminlte::page')
@section('title', 'Sindicos - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de Síndicos</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.sindicos.listar') }}"><i class="fa fa-home"></i> Síndicos</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar Síndico
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.sindicos.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_sindico")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar Síndico</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('condominios.sindicos.salvar') }}" method="POST" id="form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label" @if($errors->has('nome')) style="color: #f56954" @endif>Nome</label>
                                        <input id="Nome" type="text" class="form-control pula" name="nome" @if($errors->has('nome')) style="border:1px solid #f56954" @endif
                                        value="{{ old('nome') }}">
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Telefone" class="control-label" @if($errors->has('telefone')) style="color: #f56954" @endif>Telefone</label>
                                        <input type="text" id="Telefone" name="telefone" class="form-control pula" @if($errors->has('telefone')) style="border:1px solid #f56954" @endif
                                            data-mask="(99) 9999-9999" value="{{ old('telefone') }}">
                                        @if( $errors->has('telefone') )
                                            <span style="color: #f56954">{{ $errors->get('telefone')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label" @if($errors->has('celular')) style="color: #f56954" @endif>Celular</label>
                                        <input type="text" id="Celular" name="celular" class="form-control pula"
                                           data-mask="(99) 99999-9999" value="{{ old('celular') }}" @if($errors->has('celular')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('celular') )
                                            <span style="color: #f56954">{{ $errors->get('celular')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" id="salvar">
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
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $('#Nome').focus();
        });
        $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#Celular').unmask();
            $('#Telefone').unmask();
            $('#form').submit();
        });

    </script>
@stop
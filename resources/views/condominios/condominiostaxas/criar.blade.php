@extends('adminlte::page')
@section('titulo', 'Taxa de condomínios - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de taxas de condomínios</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.condominios.exibir',['id' => $idCondominio ]) }}"><i class="fa fa-home"></i> Taxas de Condomínios</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar taxa de condomínio
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.condominios.exibir', ['id' => $idCondominio ]) }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar taxa de condomínio</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('condominios.condominiostaxas.salvar', [$idCondominio]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Descricao" class="control-label" @if($errors->has('descricao')) style="color: #f56954" @endif>Descrição</label>
                                    <input id="Descricao" type="text" class="form-control pula" name="descricao" {{ old('descricao') }} @if($errors->has('descricao')) style="border:1px solid #f56954" @endif>
                                    @if( $errors->has('descricao') )
                                        <span style="color: #f56954">{{ $errors->get('descricao')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Valor" class="control-label" @if($errors->has('valor')) style="color: #f56954" @endif>Valor</label>
                                    <input id="Valor" type="text" class="form-control pula" name="valor" value="{{ old('valor') }}" @if($errors->has('valor')) style="border:1px solid #f56954" @endif>
                                    @if( $errors->has('valor') )
                                        <span style="color: #f56954">{{ $errors->get('valor')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr/>
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
@endsection
@section('jf')
    <script>
        $(document).ready(function () {
            $('#Descricao').focus();
        });
    </script>
@endsection
@extends('adminlte::page')
@section('titulo', 'Estado Civil - Criar')
@section('content_header')
    <h1>Cadastro <small>de Estado Civil</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.estadoCivil.listar') }}"><i class="fa fa-home"></i> Estado Civil</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar estado civil
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('diversos.estadoCivil.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_estadocivil")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar estado civil</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('diversos.estadoCivil.salvar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Descricao" class="control-label"
                                           @if($errors->has('descricao')) style="color: #f56954" @endif>Descrição</label>
                                    <input type="text" name="descricao" id="Descricao" class="form-control pula"
                                           @if($errors->has('descricao')) style="border:1px solid #f56954" @endif
                                           value="{{ old('descricao') ? old('descricao') : '' }}">
                                    @if( $errors->has('descricao') )
                                        <span style="color: #f56954">{{ $errors->get('descricao')[0] }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ExigeConjuge" class="control-label"
                                               @if($errors->has('exige_conjuge')) style="color: #f56954" @endif>Exige conjuge?</label>
                                        <select name="exige_conjuge" id="ExigeConjuge" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="Sim" {{ old('exige_conjuge') == 1 ? 'selected' : '' }}>Sim
                                            </option>
                                            <option value="Nao" {{ old('exige_conjuge') == 0 ? 'selected' : '' }}>Não
                                            </option>
                                        </select>
                                        @if( $errors->has('exige_conjuge') )
                                            <span style="color: #f56954">{{ $errors->get('exige_conjuge')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
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
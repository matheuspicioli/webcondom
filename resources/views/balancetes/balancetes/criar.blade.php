@extends('adminlte::page')
@section('title', 'Balancetes - Cadastrar')
@section('content_header')
    <h1>Cadastro
        <small>de balancetes</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.balancetes.listar') }}"><i class="fa fa-group"></i> Balancetes</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar balancete
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.balancetes.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_balancete")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar balancete</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('financeiros.balancetes.salvar') }}" method="POST" id="form">
                            {{ csrf_field() }}
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="condominio_id" class="control-label" @if($errors->has('condominio_id')) style="color: #f56954" @endif>Condominío</label>
                                        <select name="condominio_id" id="condominio_id" class="form-control select2">
                                            <option value="" selected disabled>------------------------SELECIONE------------------------</option>
                                            @foreach($condominios as $condominio)
												<option value="{{ $condominio->id }}" {{ old('condominio_id') == $condominio->id ? 'selected' : '' }}>
													{{ $condominio->id }} - {{ $condominio->nome }} - {{ $condominio->apelido }}
												</option>
											@endforeach
										</select>
										@if( $errors->has('condominio_id') )
											<span style="color: #f56954">{{ $errors->get('condominio_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="competencia" class="control-label" @if($errors->has('competencia')) style="color: #f56954" @endif>Competência</label>
										<input type="text" id="competencia" name="competencia" class="form-control pula" @if($errors->has('competencia')) style="border:1px solid #f56954" @endif
										data-mask="9999/99" value="{{ old('competencia') ? old('competencia') : '' }}" placeholder="Ex.: aaaa/mm">
										@if( $errors->has('competencia') )
											<span style="color: #f56954">{{ $errors->get('competencia')[0] }}</span>
										@endif
									</div>
								</div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="referencia" class="control-label" @if($errors->has('referencia')) style="color: #f56954" @endif>Referência</label>
                                        <input type="text" id="referencia" name="referencia" class="form-control pula" @if($errors->has('referencia')) style="border:1px solid #f56954" @endif
                                            value="{{ old('referencia') ? old('referencia') : '' }}">
                                        @if( $errors->has('referencia') )
                                            <span style="color: #f56954">{{ $errors->get('referencia')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="data_inicial" class="control-label"
                                               @if($errors->has('data_inicial')) style="color: #f56954" @endif>Data inicial</label>
                                        <input type="date" name="data_inicial" id="data_inicial"
                                               class="form-control" @if($errors->has('data_inicial')) style="border:1px solid #f56954" @endif
                                               value="{{ old('data_inicial') ? old('data_inicial') : '' }}">
                                        @if( $errors->has('data_inicial') )
                                            <span style="color: #f56954">{{ $errors->get('data_inicial')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="data_final" class="control-label"
											   @if($errors->has('data_final')) style="color: #f56954" @endif>Data final</label>
										<input type="date" name="data_final" id="data_final"
											   class="form-control" @if($errors->has('data_final')) style="border:1px solid #f56954" @endif
											   value="{{ old('data_final') ? old('data_final') : '' }}">
										@if( $errors->has('data_final') )
											<span style="color: #f56954">{{ $errors->get('data_final')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2 col-md-offset-4">
									<div class="form-group">
										<label for="saldo_anterior" class="control-label" @if($errors->has('saldo_anterior')) style="color: #f56954" @endif>Saldo anterior</label>
										<input type="text" id="saldo_anterior" name="saldo_anterior" class="form-control pula" @if($errors->has('saldo_anterior')) style="border:1px solid #f56954" @endif
											value="{{ old('saldo_anterior') ? old('saldo_anterior') : '' }}">
										@if( $errors->has('saldo_anterior') )
											<span style="color: #f56954">{{ $errors->get('saldo_anterior')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="saldo_atual" class="control-label" @if($errors->has('saldo_atual')) style="color: #f56954" @endif>Saldo atual</label>
										<input type="text" id="saldo_atual" name="saldo_atual" class="form-control pula" @if($errors->has('saldo_atual')) style="border:1px solid #f56954" @endif
											value="{{ old('saldo_atual') ? old('saldo_anterior') : '' }}">
										@if( $errors->has('saldo_atual') )
											<span style="color: #f56954">{{ $errors->get('saldo_atual')[0] }}</span>
										@endif
									</div>
								</div>
                            </div>
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<div class="form-group">
										<textarea class="ckeditor" name="resumo" id="resumo" rows="10">{!! old('resumo') ?? '' !!}</textarea>
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
@endsection
@section('js')
	<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
        	$('#condominio_id').focus();
            $('.select2').select2();
        });
        $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#competencia').unmask();
            $('#form').submit();
        });
    </script>
@endsection
@extends('adminlte::page')
@section('title', 'Balancetes - Editar')
@section('content_header')
    <h1>Balancetes - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.balancetes.listar') }}"><i class="fa fa-home"></i> Balancetes</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Balancete
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
    @can("exibir_balancete")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar Balancete</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="POST" enctype="multipart/form-data" id="form"
							  action="{{ route('financeiros.balancetes.alterar', ['id' => $balancete->id ]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="condominio_id" class="control-label" @if($errors->has('condominio_id')) style="color: #f56954" @endif>Condominío</label>
										<select name="condominio_id" id="condominio_id" class="form-control select2">
											@foreach($condominios as $condominio)
												<option value="{{ $condominio->id }}" {{ old('condominio_id') == $condominio->id ? 'selected' : ($balancete->condominio_id == $condominio->id ? 'selected' : '') }}>
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
											data-mask="9999/99" placeholder="Ex: aaaa/mm" value="{{ old('competencia') ? old('competencia') : ($balancete->competencia ? $balancete->competencia : '') }}">
										@if( $errors->has('competencia') )
											<span style="color: #f56954">{{ $errors->get('competencia')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="referencia" class="control-label" @if($errors->has('referencia')) style="color: #f56954" @endif>Referência</label>
										<input type="text" id="referencia" name="referencia" class="form-control pula" @if($errors->has('referencia')) style="border:1px solid #f56954" @endif
										value="{{ old('referencia') ? old('referencia') : ($balancete->referencia ? $balancete->referencia : '') }}">
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
											   value="{{ old('data_inicial') ? old('data_inicial') : $balancete->data_inicial->format('Y-m-d') }}">
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
											   value="{{ old('data_final') ? old('data_final') : $balancete->data_final->format('Y-m-d') }}">
										@if( $errors->has('data_final') )
											<span style="color: #f56954">{{ $errors->get('data_final')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2 col-md-offset-4">
									<div class="form-group">
										<label for="saldo_anterior" class="control-label" @if($errors->has('saldo_anterior')) style="color: #f56954" @endif>Saldo anterior</label>
										<input type="text" id="saldo_anterior" name="saldo_anterior" class="form-control pula" @if($errors->has('saldo_anterior')) style="border:1px solid #f56954" @endif
											value="{{ old('saldo_anterior') ? old('saldo_anterior') : $balancete->saldo_anterior_view }}">
										@if( $errors->has('saldo_anterior') )
											<span style="color: #f56954">{{ $errors->get('saldo_anterior')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="saldo_atual" class="control-label" @if($errors->has('saldo_atual')) style="color: #f56954" @endif>Saldo atual</label>
										<input type="text" id="saldo_atual" name="saldo_atual" class="form-control pula" @if($errors->has('saldo_atual')) style="border:1px solid #f56954" @endif
											value="{{ old('saldo_atual') ? old('saldo_anterior') : $balancete->saldo_atual_view }}">
										@if( $errors->has('saldo_atual') )
											<span style="color: #f56954">{{ $errors->get('saldo_atual')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<div class="form-group">
										<textarea class="ckeditor" name="resumo" id="resumo" rows="10">{!! old('resumo') ?? $balancete->resumo ?? '' !!}</textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
                                    @can("editar_balancete")
                                        <button class="btn btn-info" type="submit" id="salvar">
                                            <i class="fa fa-save"></i> Alterar</button>
                                    @else
                                        <button disabled class="btn btn-info" type="submit">
                                            <i class="fa fa-save"></i> Alterar</button>
                                    @endcan
                                    @can("deletar_balancete")
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                            <i class="fa fa-trash"></i> Excluir</button>
                                    @else
                                        <button disabled class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                            <i class="fa fa-trash"></i> Excluir</button>
                                    @endcan								</div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL EXCLUIR BANCO -->
        <div id="modal-excluir" class="modal modal-danger fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="modal-title">Confirmar exclusão</h3>
                    </div>

                    <div class="modal-body">
                        <h3>Dados da exclusão: </h3>
                        <p>Condomínio:   {{ $condominio->nome }}</p>
                        <p data-mask="9999/99">Competencia:   {{ $balancete->competencia }}</p>
                        <p>Referendcia:   {{ $balancete->referencia}}</p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST" action="{{ route('financeiros.balancetes.excluir', ['id' => $balancete->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
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

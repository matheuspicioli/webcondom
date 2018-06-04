@php
	$editar = isset($proprietario);
	$tab = 0;
@endphp
@extends('adminlte::page')
@section('title', 'Proprietários - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
		<h1>Proprietários - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Proprietários</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('entidades.proprietarios.listar') }}"><i class="fa fa-home"></i> Proprietários</a>
        </li>
		<li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Proprietário
		</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('entidades.proprietarios.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("exibir_proprietario")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
						<h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} Proprietário</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( isset($proprietario) )
							<form method="POST" action="{{ route('entidades.proprietarios.alterar', ['id' => $proprietario->id ]) }}" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('entidades.proprietarios.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
								<div class="row">
									<div class="col-md-1">
										<div class="form-group @if($errors->has('codigo')) has-error @endif">
											@component('formularios.String',[
												'nome'		=> 'codigo',
												'id'		=> 'codigo',
												'valor'		=> old('codigo') ?? $proprietario->codigo ?? '',
												'texto'		=> 'Código',
												'tabindex'	=> $tab += 1
											])@endcomponent
											@if( $errors->has('codigo') )
												<span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
											@endif
										</div>
									</div>
								</div>
								@component('formularios.entidades.Entidade',[
									'entidade'			=> isset($proprietario) ? $proprietario->entidade : null,
									'tab'				=> $tab,
									'estados_civis' 	=> $estados_civis,
									'cidades'			=> $cidades,
									'regimes_casamentos'=> $regimes_casamentos
								])
									@slot('endereco_cobranca')
										<div class="row">
											<div class="col-md-12">
												<div class="box box-warning box-solid">
													<div class="box-header with-border">
														<h3 class="box-title">Endereço Cobrança</h3>
													</div>
													<div class="box-body">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group @if($errors->has('cep_cobranca')) has-error @endif">
																	@component('formularios.String',[
																		'id'			=> 'cep_cobranca',
																		'nome'			=> 'cep_cobranca',
																		'texto'			=> 'CEP',
																		'valor'			=> old('cep_cobranca') ?? $proprietario->entidade->endereco_cobranca->cep ?? '',
																		'atributos'		=> 'data-mask=99999-999'
																	])@endcomponent
																	@if( $errors->has('cep_cobranca') )
																		<span style="color: #f56954">{{ $errors->get('cep_cobranca')[0] }}</span>
																	@endif
																</div>
															</div>
															<div class="col-md-8">
																<div class="form-group @if($errors->has('logradouro_cobranca')) has-error @endif">
																	@component('formularios.String',[
																		'id'			=> 'logradouro_cobranca',
																		'nome'			=> 'logradouro_cobranca',
																		'texto'			=> 'Logradouro',
																		'valor'			=> old('logradouro_cobranca') ?? $proprietario->entidade->endereco_cobranca->logradouro ?? ''
																	])@endcomponent
																	@if( $errors->has('logradouro_cobranca') )
																		<span style="color: #f56954">{{ $errors->get('logradouro_cobranca')[0] }}</span>
																	@endif
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-2">
																<div class="form-group @if($errors->has('numero_cobranca')) has-error @endif">
																	@component('formularios.String',[
																		'id'			=> 'numero_cobranca',
																		'nome'			=> 'numero_cobranca',
																		'texto'			=> 'Número',
																		'valor'			=> old('numero_cobranca') ?? $proprietario->entidade->endereco_cobranca->numero ?? ''
																	])@endcomponent
																	@if( $errors->has('numero_cobranca') )
																		<span style="color: #f56954">{{ $errors->get('numero_cobranca')[0] }}</span>
																	@endif
																</div>
															</div>
															<div class="col-md-10">
																<div class="form-group @if($errors->has('complemento_cobranca')) has-error @endif">
																	@component('formularios.String',[
																		'id'			=> 'complemento_cobranca',
																		'nome'			=> 'complemento_cobranca',
																		'texto'			=> 'Complemento',
																		'valor'			=> old('complemento_cobranca') ?? $proprietario->entidade->endereco_cobranca->complemento ?? ''
																	])@endcomponent
																	@if( $errors->has('complemento_cobranca') )
																		<span style="color: #f56954">{{ $errors->get('complemento_cobranca')[0] }}</span>
																	@endif
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-4">
																<div class="form-group @if($errors->has('bairro_cobranca')) has-error @endif">
																	@component('formularios.String',[
																		'id'			=> 'bairro_cobranca',
																		'nome'			=> 'bairro_cobranca',
																		'texto'			=> 'Bairro',
																		'valor'			=> old('bairro_cobranca') ?? $proprietario->entidade->endereco_cobranca->bairro ?? ''
																	])@endcomponent
																	@if( $errors->has('bairro_cobranca') )
																		<span style="color: #f56954">{{ $errors->get('bairro_cobranca')[0] }}</span>
																	@endif
																</div>
															</div>
															<div class="col-md-8">
																<div class="form-group @if($errors->has('cidade_id_cobranca')) has-error @endif">
																	@component('formularios.Select',[
																		'id'		=> 'cidade_id_cobranca',
																		'nome'		=> 'cidade_id_cobranca',
																		'texto'		=> 'Cidade',
																		'classes'	=> 'select2'
																	])
																		<option selected disabled>-------Selecione uma cidade-------</option>
																		@foreach($cidades as $cidade)
																			@if( isset($proprietario) )
																				@if( isset($proprietario->entidade->endereco_cobranca) )
																					<option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : ($cidade->id == $proprietario->entidade->endereco_cobranca->cidade->id ? 'selected' : '') }}>{{ $cidade->descricao }}
																						- {{ $cidade->estado->descricao }}</option>
																				@else
																					<option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : '' }}>{{ $cidade->descricao }}
																						- {{ $cidade->estado->descricao }}</option>
																				@endif
																			@else
																				<option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : '' }}>{{ $cidade->descricao }}
																					- {{ $cidade->estado->descricao }}</option>
																			@endif
																		@endforeach
																	@endcomponent
																	@if( $errors->has('cidade_id_cobranca') )
																		<span style="color: #f56954">{{ $errors->get('cidade_id_cobranca')[0] }}</span>
																	@endif
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									@endslot
								@endcomponent
							</form>
                    </div>
                </div>
            </div>
        </div>
		@if( isset($proprietario) )
			<!-- MODAL EXCLUIR PROPRIETARIOS -->
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
                        <h4>Deseja realmente excluir o proprietário "{{ $proprietario->entidade->nome }}"?</h4>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST" action="{{ route('entidades.proprietarios.excluir', ['id' => $proprietario->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		@endif
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
	<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>
    <script src="{{ asset('js/entidades/entidade.js') }}"></script>
@endsection

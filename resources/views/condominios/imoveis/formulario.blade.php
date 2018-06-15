@php
	$editar = isset($imovel);
@endphp
@extends('adminlte::page')
@section('title', 'Categorias - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
    	<h1>Imóveis - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Imóveis</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.imoveis.listar') }}"><i class="fa fa-home"></i> Imóveis</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} imóvel
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
			@component('formularios.Link',[
				'link'		=> route('condominios.imoveis.listar'),
				'classes'	=> 'btn btn-default',
				'icone'		=> 'fa fa-rotate-left',
				'texto'		=> 'Voltar'
			])@endcomponent
            <hr>
        </div>
    </div>
    @can("exibir_categoria")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
							{{ $editar ? 'Editar' : 'Cadastrar' }} imóvel
						</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( isset($imovel) )
							<form method="POST" action="{{ route('condominios.imoveis.alterar', ['id' => $imovel->id ]) }}" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('condominios.imoveis.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
								<div class="row">
									<div class="col-md-3">
										<div class="form-group @if($errors->has('codigo')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'Codigo',
												'nome'		=> 'codigo',
												'texto'		=> 'Código',
												'valor'		=> old('codigo') ?? $imovel->codigo ?? '',
												'tabindex'	=> '1',
												'titulo'	=> 'Código',
												'atributos'	=> 'data-mask=999999'
											])@endcomponent
											@if( $errors->has('codigo') )
												<span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group @if($errors->has('referencia')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'referencia',
												'nome'		=> 'referencia',
												'texto'		=> 'Referência',
												'valor'		=> old('referencia') ?? $imovel->referencia ?? '',
												'tabindex'	=> '2',
												'titulo'	=> 'Referência',
											])@endcomponent
											@if( $errors->has('referencia') )
												<span style="color: #f56954">{{ $errors->get('referencia')[0] }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group @if($errors->has('tipo_imovel_id')) has-error @endif">
											@component('formularios.Select',[
												'id'		=> 'tipo_imovel',
												'nome'		=> 'tipo_imovel_id',
												'texto'		=> 'Tipo imóvel',
												'titulo'	=> 'Tipo imóvel',
												'tabindex'	=> '3',
												'classes'	=> 'select2',
											])
												@foreach($tiposImoveis as $tipoImovel)
													@if( isset($imovel) )
														<option value="{{ $tipoImovel->id }}" {{ old('tipo_imovel_id') == $tipoImovel->id ? 'selected' : ($tipoImovel->id == $imovel->tipo_imovel_id ? 'selected' : '') }}>
															{{ $tipoImovel->descricao }}
														</option>
													@else
														<option value="{{ $tipoImovel->id }}" {{ old('tipo_imovel_id') == $tipoImovel->id ? 'selected' : '' }}>
															{{ $tipoImovel->descricao }}
														</option>
													@endif
												@endforeach
											@endcomponent
											@if( $errors->has('tipo_imovel_id') )
												<span style="color: #f56954">{{ $errors->get('tipo_imovel_id')[0] }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group @if($errors->has('categoria_id')) has-error @endif">
											@component('formularios.Select',[
												'id'		=> 'categoria',
												'nome'		=> 'categoria_id',
												'texto'		=> 'Categoria',
												'titulo'	=> 'Categoria',
												'tabindex'	=> '4',
												'classes'	=> 'select2'
											])
												@foreach($categorias as $categoria)
													@if( isset($imovel) )
														<option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : ($categoria->id == $imovel->categoria_id ? 'selected' : '') }}>
															{{ $categoria->descricao }}
														</option>
													@else
														<option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
															{{ $categoria->descricao }}
														</option>
													@endif
												@endforeach
											@endcomponent
											@if( $errors->has('categoria_id') )
												<span style="color: #f56954">{{ $errors->get('categoria_id')[0] }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group @if($errors->has('condominio_id')) has-error @endif">
											@component('formularios.Select',[
												'id'		=> 'condominio',
												'nome'		=> 'condominio_id',
												'texto'		=> 'Condomínio',
												'titulo'	=> 'Condomínio',
												'tabindex'	=> '5',
												'classes'	=> 'select2',
											])
												@foreach($condominios as $condominio)
													@if( isset($imovel) )
														<option value="{{ $condominio->id }}" {{ old('condominio_id') == $condominio->id ? 'selected' : ($condominio->id == $imovel->condominio_id ? 'selected' : '') }}>
															{{ $condominio->nome }}
														</option>
													@else
														<option value="{{ $condominio->id }}" {{ old('condominio_id') == $condominio->id ? 'selected' : '' }}>
															{{ $condominio->nome }}
														</option>
													@endif
												@endforeach
											@endcomponent
											@if( $errors->has('condominio_id') )
												<span style="color: #f56954">{{ $errors->get('condominio_id')[0] }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group @if($errors->has('valor_locacao')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'valor_locacao',
												'nome'		=> 'valor_locacao',
												'texto'		=> 'Valor de locação',
												'titulo'	=> 'Valor de locação',
												'valor'		=> old('valor_locacao') ?? $imovel->valor_locacao_view ?? '',
												'tabindex'	=> '6'
											])@endcomponent
											@if( $errors->has('valor_locacao') )
												<span style="color: #f56954">{{ $errors->get('valor_locacao')[0] }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group @if($errors->has('valor_venda')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'valor_venda',
												'nome'		=> 'valor_venda',
												'texto'		=> 'Valor de venda',
												'titulo'	=> 'Valor de venda',
												'valor'		=> old('valor_venda') ?? $imovel->valor_venda_view ?? '',
												'tabindex'	=> '7'
											])@endcomponent
											@if( $errors->has('valor_venda') )
												<span style="color: #f56954">{{ $errors->get('valor_venda')[0] }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group @if($errors->has('codigo_agua')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'codigo_agua',
												'nome'		=> 'codigo_agua',
												'texto'		=> 'Código água',
												'titulo'	=> 'Código água',
												'valor'		=> old('codigo_agua') ?? $imovel->codigo_agua ?? '',
												'tabindex'	=> '8'
											])@endcomponent
											@if( $errors->has('codigo_agua') )
												<span style="color: #f56954">{{ $errors->get('codigo_agua')[0] }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group @if($errors->has('codigo_iptu')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'codigo_iptu',
												'nome'		=> 'codigo_iptu',
												'texto'		=> 'Código IPTU',
												'titulo'	=> 'Código IPTU',
												'valor'		=> old('codigo_iptu') ?? $imovel->codigo_iptu ?? '',
												'tabindex'	=> '9'
											])@endcomponent
											@if( $errors->has('codigo_iptu') )
												<span style="color: #f56954">{{ $errors->get('codigo_iptu')[0] }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group @if($errors->has('codigo_energia')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'codigo_iptu',
												'nome'		=> 'codigo_iptu',
												'texto'		=> 'Código energia',
												'titulo'	=> 'Código energia',
												'valor'		=> old('codigo_energia') ?? $imovel->codigo_energia ?? '',
												'tabindex'	=> '10'
											])@endcomponent
											@if( $errors->has('codigo_energia') )
												<span style="color: #f56954">{{ $errors->get('codigo_energia')[0] }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="form-group">
											@component('formularios.Textarea',[
												'id' 		=> 'descritivo',
												'nome'		=> 'descritivo',
												'texto'		=> 'Descritivo',
												'titulo'	=> 'Descritivo',
												'valor'		=> old('descritivo') ?? $imovel->descritivo ?? '',
												'rows'		=> '4',
												'tabindex'	=> '11'
											])
											@endcomponent
											@if( $errors->has('descritivo') )
												<span style="color: #f56954">{{ $errors->get('descritivo')[0] }}</span>
											@endif
										</div>
									</div>
								</div>
								@component('formularios.enderecos.Endereco',[
									'model'     => $imovel ?? null,
									'cidades'   => $cidades,
									'prox_tab'	=> '12'
								])@endcomponent
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											@can("editar_imovel")
												@component('formularios.Botao',[
													'classes' 	=> 'btn-info',
													'icone'		=> 'fa fa-save',
													'id'		=> 'salvar',
													'titulo'	=> 'Salvar',
													'texto'		=> 'Salvar'
												])@endcomponent
											@else
												@component('formularios.Botao',[
													'classes' 	=> 'btn-info',
													'icone'		=> 'fa fa-save',
													'id'		=> 'salvar',
													'titulo'	=> 'Salvar',
													'texto'		=> 'Salvar',
													'atributos'	=> 'disabled'
												])@endcomponent
											@endcan
											@can("deletar_imovel")
													@component('formularios.Botao',[
														'classes' 	=> 'btn-danger',
														'icone'		=> 'fa fa-trash',
														'titulo'	=> 'Excluir',
														'texto'		=> 'Excluir',
														'atributos'	=> 'type=button',
														'toggle'	=> 'modal',
														'target'	=> '#modal-excluir'
													])@endcomponent
											@else
													@component('formularios.Botao',[
															'classes' 	=> 'btn-danger',
															'icone'		=> 'fa fa-trash',
															'titulo'	=> 'Excluir',
															'texto'		=> 'Excluir',
															'atributos'	=> 'type=button disabled',
															'toggle'	=> 'modal',
															'target'	=> '#modal-excluir'
														])@endcomponent
											@endcan
										</div>
									</div>
								</div>
                        	</form>
                    </div>
                </div>
            </div>
        </div>
		@if( $editar )
			<!-- MODAL EXCLUIR CATEGORIAS -->
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
							<h4>Deseja realmente excluir o imóvel "{{ $imovel->nome }}"?</h4>
						</div>

						<div class="modal-footer">
							<button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
							<form method="POST" action="{{ route('condominios.imoveis.excluir', ['id' => $imovel->id]) }}">
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
    <script>
		$(document).ready(function () {
			$('.select2').select2();
			$('#Codigo').focus();
		});
		$('#salvar').on('click', function(e){
			e.preventDefault();
			$('#CEP').unmask();
			$('#form').submit();
		});
    </script>
@endsection

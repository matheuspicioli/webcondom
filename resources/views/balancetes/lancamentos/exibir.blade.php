@extends('adminlte::page')
@section('title', 'Balancete lançamento - Editar')
@section('content_header')
	<h1>Balancete lançamento -
		<small>edição</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
		</li>
		<li>
			<a href="{{ route('balancetes.lancamentos.listar') }}"><i class="fa fa-home"></i> Balancete lançamentos</a>
		</li>
		<li class="active">
			<i class="fa fa-pencil"></i> Editar Balancete lançamentos
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
	@can("exibir_balancete_lancamento")
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Cadastrar Balancete Lançamento</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" type="button" data-widget="collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<form method="POST"
							  action="{{ route('balancetes.lancamentos.alterar', ['id' => $lancamento->id ]) }}">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<div class="row">
								<div class="col-md-2 col-md-offset-2">
									<div class="form-group">
										<label for="data_lancamento" class="control-label"
											   @if($errors->has('data_lancamento')) style="color: #f56954" @endif>Data
											lançamento</label>
										<input type="date" name="data_lancamento" id="data_lancamento"
											   class="form-control"
											   @if($errors->has('data_lancamento')) style="border:1px solid #f56954"
											   @endif
											   value="{{ old('data_lancamento') ? old('data_lancamento') : $lancamento->data_lancamento->format('Y-m-d') }}">
										@if( $errors->has('data_lancamento') )
											<span style="color: #f56954">{{ $errors->get('data_lancamento')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="documento" class="control-label"
											   @if($errors->has('documento')) style="color: #f56954" @endif>Documento</label>
										<input type="text" id="documento" name="documento" class="form-control pula"
											   @if($errors->has('documento')) style="border:1px solid #f56954" @endif
											   value="{{ old('documento') ? old('documento') : $lancamento->documento }}">
										@if( $errors->has('documento') )
											<span style="color: #f56954">{{ $errors->get('documento')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="historico" class="control-label"
											   @if($errors->has('historico')) style="color: #f56954" @endif>Histórico</label>
										<input type="text" id="historico" name="historico" class="form-control pula"
											   @if($errors->has('historico')) style="border:1px solid #f56954" @endif
											   value="{{ old('historico') ? old('historico') : $lancamento->historico }}">
										@if( $errors->has('historico') )
											<span style="color: #f56954">{{ $errors->get('historico')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-md-offset-3">
									<div class="form-group">
										<label for="valor" class="control-label"
											   @if($errors->has('valor')) style="color: #f56954" @endif>Valor</label>
										<input type="text" id="valor" name="valor" class="form-control pula"
											   @if($errors->has('valor')) style="border:1px solid #f56954" @endif
											   value="{{ old('valor') ? old('valor') : $lancamento->valor }}">
										@if( $errors->has('valor') )
											<span style="color: #f56954">{{ $errors->get('valor')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="tipo" class="control-label"
											   @if($errors->has('tipo')) style="color: #f56954" @endif>Tipo</label>
										<select name="tipo" id="tipo" class="form-control select2">
											<option value="Debito" {{ old('tipo') == 'Debito' ? 'selected' : ($lancamento->tipo == 'Debito' ? 'selected' : '') }}>
												Débito
											</option>
											<option value="Credito" {{ old('tipo') == 'Credito' ? 'selected' : ($lancamento->tipo == 'Credito' ? 'selected' : '') }}>
												Crédito
											</option>
										</select>
										@if( $errors->has('tipo') )
											<span style="color: #f56954">{{ $errors->get('tipo')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="folha" class="control-label"
											   @if($errors->has('folha')) style="color: #f56954" @endif>Folha</label>
										<input type="text" id="folha" name="folha" class="form-control pula"
											   @if($errors->has('folha')) style="border:1px solid #f56954" @endif
											   value="{{ old('folha') ? old('folha') : $lancamento->folha }}">
										@if( $errors->has('folha') )
											<span style="color: #f56954">{{ $errors->get('folha')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-md-offset-1">
									<div class="form-group">
										<label for="balancete_id" class="control-label" @if($errors->has('balancete_id')) style="color: #f56954" @endif>Balancete</label>
										<select name="balancete_id" id="balancete_id" class="form-control select2">
											@foreach($balancetes as $balancete)
												<option value="{{ $balancete->id }}" {{ old('balancete_id') == $balancete->id
													? 'selected' : ($lancamento->balancete_id == $balancete->id ? 'selected' : '') }}>
													{{ $balancete->referencia ? $balancete->referencia : '' }} - {{ $balancete->competencia ? $balancete->competencia : '' }}
												</option>
											@endforeach
										</select>
										@if( $errors->has('balancete_id') )
											<span style="color: #f56954">{{ $errors->get('balancete_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="plano_contas_id" class="control-label" @if($errors->has('plano_contas_id')) style="color: #f56954" @endif>Plano de contas</label>
										<select name="plano_contas_id" id="plano_contas_id" class="form-control select2">
											@foreach($plano_contas as $plano)
												@foreach($plano->grupos as $grupo)
													@foreach($grupo->contas as $conta)
														<option value="{{ $conta->id }}" {{ old('plano_contas_id') == $plano->id
															? 'selected' : ($lancamento->plano_conta_id == $plano->id ? 'selected' : '') }}>
															{{ $plano->tipo }}.{{ $grupo->grupo }}.{{ $conta->conta }}
														</option>
													@endforeach
												@endforeach
											@endforeach
										</select>
										@if( $errors->has('plano_contas_id') )
											<span style="color: #f56954">{{ $errors->get('plano_contas_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="fornecedor_id" class="control-label" @if($errors->has('fornecedor_id')) style="color: #f56954" @endif>Fornecedor</label>
										<select name="fornecedor_id" id="fornecedor_id" class="form-control select2">
											@foreach($fornecedores as $fornecedor)
												<option value="{{ $balancete->id }}" {{ old('fornecedor_id') == $fornecedor->id
													? 'selected' : ($lancamento->fornecedor_id == $fornecedor->id ? 'selected' : '') }}>
													{{ $fornecedor->entidade->nome }}
												</option>
											@endforeach
										</select>
										@if( $errors->has('fornecedor_id') )
											<span style="color: #f56954">{{ $errors->get('fornecedor_id')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<button class="btn btn-info" type="submit">
											<i class="fa fa-save"></i> Alterar
										</button>
									</div>
								</div>
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
						<h4>Deseja realmente excluir o balancete com o período entre
							{{ $balancete->data_inicial->format('d/m/Y') }}
							- {{ $balancete->data_final->format('d/m/Y') }}?</h4>
					</div>

					<div class="modal-footer">
						<button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
						<form method="POST"
							  action="{{ route('financeiros.balancetes.excluir', ['id' => $balancete->id]) }}">
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
	<script>
		$(document).ready(function () {
			$('#condominio_id').focus();
			$('.select2').select2();
		});
	</script>
@endsection

@php
	$editar = isset($funcionario);
	$tab = 0;
@endphp
@extends('adminlte::page')
@section('title', 'Funcionários - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
		<h1>Funcionários - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Funcionários</small></h1>
	@endif
	<ol class="breadcrumb">
		<li>
			<a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
		</li>
		<li>
			<a href="{{ route('entidades.funcionarios.listar') }}"><i class="fa fa-home"></i> Funcionários</a>
		</li>
		<li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Funcionários
		</li>
	</ol>
@stop
@section('content')
	<div class="row">
		<div class="col-md-1">
			<a href="{{ route('entidades.funcionarios.listar') }}" class="btn btn-default">
				<i class="fa fa-rotate-left"></i> Voltar</a>
			<hr>
		</div>
	</div>
	@can("exibir_funcionario")
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} Funcionário. {{ $editar ? 'Tipo pessoa: '.$funcionario->entidade->tipo : '' }}</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" type="button" data-widget="collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						@if( isset($funcionario) )
							<form method="POST"
								enctype="multipart/form-data"
								action="{{ route('entidades.funcionarios.alterar', ['id' => $funcionario->id ]) }}" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('entidades.funcionarios.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if( $errors->has('tipo') ) has-error @endif">
										@if($editar)
											@component('formularios.Hidden',[
												'id'	=> 'tipo',
												'nome'	=> 'tipo',
												'valor'	=> $funcionario->entidade->tipo ?? ''
											])@endcomponent
										@else
											@component('formularios.Select',[
											'id'		=> 'tipo',
											'nome'		=> 'tipo',
											'texto'		=> 'Tipo pessoa',
											'tabindex'	=> $tab += 1,
											'classes'	=> 'select2',
										])
												@if ( isset($funcionario) )
													<option value="CPF"
															{{ old('tipo') == 'CPF' ? 'selected' : ($funcionario->entidade->tipo == 'CPF' ? 'selected' : '') }}>
														CPF
													</option>
													<option value="CNPJ" {{ old('tipo') == 'CNPJ' ? 'selected' : ($funcionario->entidade->tipo == 'CNPJ' ? 'selected' : '') }}>
														CNPJ
													</option>
												@else
													<option value="CPF"
															{{ old('tipo') == 'CPF' ? 'selected' : '' }}>
														CPF
													</option>
													<option value="CNPJ" {{ old('tipo') == 'CNPJ' ? 'selected' : '' }}>
														CNPJ
													</option>
												@endif
											@endcomponent
											@if( $errors->has('tipo') )
												<span style="color: #f56954">{{ $errors->get('tipo')[0] }}</span>
											@endif
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group @if($errors->has('cpf_cnpj')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'cpf_cnpj',
											'nome'		=> 'cpf_cnpj',
											'texto'		=> 'CPF/CNPJ',
											'valor'		=> old('cpf_cnpj') ?? $funcionario->entidade->cpf_cnpj ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('cpf_cnpj') )
											<span style="color: #f56954">{{ $errors->get('cpf_cnpj')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if($errors->has('departamento_id')) has-error @endif">
										@component('formularios.Select',[
											'id'			=> 'departamento',
											'nome'			=> 'departamento_id',
											'texto'			=> 'Departamento',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'select2'
										])
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($departamentos as $departamento)
												@if( isset($funcionario) )
													<option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : ($funcionario->departamento_id == $departamento->id ? 'selected' : '') }}>
														{{ $departamento->descricao }}
													</option>
												@else
													<option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
														{{ $departamento->descricao }}
													</option>
												@endif
											@endforeach
										@endcomponent
										@if( $errors->has('departamento_id') )
											<span style="color: #f56954">{{ $errors->get('departamento_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group @if($errors->has('setor_id')) has-error @endif">
										@component('formularios.Select',[
											'id'			=> 'setor',
											'nome'			=> 'setor_id',
											'texto'			=> 'Setor',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'select2'
										])
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($setores as $setor)
												@if( isset($funcionario) )
													<option value="{{ $setor->id }}" {{ old('setor_id') ? old('setor_id') : ($setor->id == $funcionario->setor_id ? 'selected' : '') }}>
														{{ $setor->descricao }}
													</option>
												@else
													<option value="{{ $setor->id }}" {{ old('setor_id') ? old('setor_id') : '' }}>
														{{ $setor->descricao }}
													</option>
												@endif
											@endforeach
										@endcomponent
										@if( $errors->has('setor_id') )
											<span style="color: #f56954">{{ $errors->get('setor_id')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group @if($errors->has('nome')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'nome',
											'nome'		=> 'nome',
											'texto'		=> 'Nome',
											'valor'		=> old('nome') ?? $funcionario->entidade->nome ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('nome') )
											<span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group @if($errors->has('apelido')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'apelido',
											'nome'		=> 'apelido',
											'texto'		=> 'Apelido',
											'valor'		=> old('apelido') ?? $funcionario->entidade->apelido ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('apelido') )
											<span style="color: #f56954">{{ $errors->get('apelido')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group @if($errors->has('rg_ie')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'rg_ie',
											'nome'		=> 'rg_ie',
											'texto'		=> 'RGIE',
											'valor'		=> old('rg_ie') ?? $funcionario->entidade->rg_ie ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('rg_ie') )
											<span style="color: #f56954">{{ $errors->get('rg_ie')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group @if($errors->has('codigo')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'codigo',
											'nome'		=> 'codigo',
											'texto'		=> 'Código',
											'valor'		=> old('codigo') ?? $funcionario->codigo ?? '',
											'tabindex'	=> $tab += 1,
											'atributos'	=> 'data-mask=999999'
										])@endcomponent
										@if( $errors->has('codigo') )
											<span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group @if($errors->has('fantasia')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'fantasia',
											'nome'			=> 'fantasia',
											'texto'			=> 'Fantasia',
											'valor'			=> old('fantasia') ?? $funcionario->entidade->fantasia ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cnpj',
											'classes_label'	=> 'cnpj'
										])@endcomponent
										@if( $errors->has('fantasia') )
											<span style="color: #f56954">{{ $errors->get('fantasia')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group @if($errors->has('inscricao_municipal')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'inscricao_municipal',
											'nome'			=> 'inscricao_municipal',
											'texto'			=> 'Inscrição municipal',
											'valor'			=> old('inscricao_municipal') ?? $funcionario->entidade->inscricao_municipal ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cnpj',
											'classes_label'	=> 'cnpj'
										])@endcomponent
										@if( $errors->has('inscricao_municipal') )
											<span style="color: #f56954">{{ $errors->get('inscricao_municipal')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group @if($errors->has('ramo_atividade')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'ramo_atividade',
											'nome'			=> 'ramo_atividade',
											'texto'			=> 'Ramo atividade',
											'valor'			=> old('ramo_atividade') ?? $funcionario->entidade->ramo_atividade ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cnpj',
											'classes_label'	=> 'cnpj'
										])@endcomponent
										@if( $errors->has('ramo_atividade') )
											<span style="color: #f56954">{{ $errors->get('ramo_atividade')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group @if($errors->has('data_abertura')) has-error @endif">
										@component('formularios.Data',[
											'id'			=> 'data_abertura',
											'nome'			=> 'data_abertura',
											'texto'			=> 'Data abertura',
											'valor'			=> old('data_abertura') ?? ( isset($funcionario->entidade->ramo_atividade) ? $funcionario->entidade->data_abertura->format('Y-m-d') : ''),
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cnpj',
											'classes_label'	=> 'cnpj'
										])@endcomponent
										@if( $errors->has('data_abertura') )
											<span style="color: #f56954">{{ $errors->get('data_abertura')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if($errors->has('nome_mae')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'nome_mae',
											'nome'			=> 'nome_mae',
											'texto'			=> 'Nome da mãe',
											'valor'			=> old('nome_mae') ?? $funcionario->entidade->nome_mae ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf'
										])@endcomponent
										@if( $errors->has('nome_mae') )
											<span style="color: #f56954">{{ $errors->get('nome_mae')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group @if($errors->has('estado_civil_id')) has-error @endif">
										@component('formularios.Select',[
											'id'			=> 'estado_civil_id',
											'nome'			=> 'estado_civil_id',
											'texto'			=> 'Estado civil',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf',
										])
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($estados_civis as $estados_civil)
												@if( isset($funcionario) )
													<option value="{{ $estados_civil->id }}" {{ old('estado_civil_id') == $estados_civil->id ? 'selected' : ($funcionario->entidade->estado_civil_id == $estados_civil->id ? 'selected' : '') }}>
														{{ $estados_civil->descricao }}
													</option>
												@else
													<option value="{{ $estados_civil->id }}" {{ old('estado_civil_id') == $estados_civil->id ? 'selected' : '' }}>
														{{ $estados_civil->descricao }}
													</option>
												@endif
											@endforeach
										@endcomponent
										@if( $errors->has('estado_civil_id') )
											<span style="color: #f56954">{{ $errors->get('estado_civil_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group @if($errors->has('regime_casamento_id')) has-error @endif">
										@component('formularios.Select',[
											'id'			=> 'regime_casamento_id',
											'nome'			=> 'regime_casamento_id',
											'texto'			=> 'Regime casamento',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf',
										])
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($regimes_casamentos as $regime_casamento)
												@if( isset($funcionario) )
													<option value="{{ $regime_casamento->id }}"
															{{ old('regime_casamento_id') == $regime_casamento->id ? 'selected' : ($funcionario->entidade->regime_casamento_id == $regime_casamento->id ? 'selected' : '') }}>
														{{ $regime_casamento->descricao }}</option>
												@else
													<option value="{{ $regime_casamento->id }}"
															{{ old('regime_casamento_id') == $regime_casamento->id ? 'selected' : '' }}>
														{{ $regime_casamento->descricao }}</option>
												@endif
											@endforeach
										@endcomponent
										@if( $errors->has('regime_casamento_id') )
											<span style="color: #f56954">{{ $errors->get('regime_casamento_id')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group @if($errors->has('profissao')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'profissao',
											'nome'			=> 'profissao',
											'texto'			=> 'Profissão',
											'valor'			=> old('profissao') ?? $funcionario->entidade->profissao ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf'
										])@endcomponent
										@if( $errors->has('profissao') )
											<span style="color: #f56954">{{ $errors->get('profissao')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group @if($errors->has('data_nascimento')) has-error @endif">
										@component('formularios.Data',[
											'id'			=> 'data_nascimento',
											'nome'			=> 'data_nascimento',
											'texto'			=> 'Data de nascimento',
											'valor'			=> old('data_nascimento') ?? (isset($funcionario->entidade->data_nascimento) ? $funcionario->entidade->data_nascimento->format('Y-m-d') : ''),
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf'
										])@endcomponent
										@if( $errors->has('data_nascimento') )
											<span style="color: #f56954">{{ $errors->get('data_nascimento')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group @if($errors->has('nacionalidade')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'nacionalidade',
											'nome'			=> 'nacionalidade',
											'texto'			=> 'Nacionalidade',
											'valor'			=> old('nacionalidade') ?? $funcionario->entidade->nacionalidade ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf'
										])@endcomponent
										@if( $errors->has('nacionalidade') )
											<span style="color: #f56954">{{ $errors->get('nacionalidade')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if($errors->has('empresa')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'empresa',
											'nome'			=> 'empresa',
											'texto'			=> 'Empresa',
											'valor'			=> old('empresa') ?? $funcionario->entidade->empresa ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf'
										])@endcomponent
										@if( $errors->has('empresa') )
											<span style="color: #f56954">{{ $errors->get('empresa')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group @if($errors->has('inss')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'inss',
											'nome'			=> 'inss',
											'texto'			=> 'INSS',
											'valor'			=> old('inss') ?? $funcionario->entidade->inss ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf'
										])@endcomponent
										@if( $errors->has('inss') )
											<span style="color: #f56954">{{ $errors->get('inss')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group @if($errors->has('dependentes')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'dependentes',
											'nome'			=> 'dependentes',
											'texto'			=> 'Dependentes',
											'valor'			=> old('dependentes') ?? $funcionario->entidade->dependentes ?? '',
											'tabindex'		=> $tab += 1,
											'classes'		=> 'cpf',
											'classes_label'	=> 'cpf'
										])@endcomponent
										@if( $errors->has('dependentes') )
											<span style="color: #f56954">{{ $errors->get('dependentes')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group @if($errors->has('telefone_principal')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'telefone_principal',
											'nome'			=> 'telefone_principal',
											'texto'			=> 'Telefone principal',
											'valor'			=> old('telefone_principal') ?? $funcionario->entidade->telefone_principal ?? '',
											'tabindex'		=> $tab += 1,
											'atributos'		=> 'data-mask=(99)9999-9999'
										])@endcomponent
										@if( $errors->has('telefone_principal') )
											<span style="color: #f56954">{{ $errors->get('telefone_principal')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group @if($errors->has('telefone_comercial')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'telefone_comercial',
											'nome'			=> 'telefone_comercial',
											'texto'			=> 'Telefone comercial',
											'valor'			=> old('telefone_comercial') ?? $funcionario->entidade->telefone_comercial ?? '',
											'tabindex'		=> $tab += 1,
											'atributos'		=> 'data-mask=(99)9999-9999'
										])@endcomponent
										@if( $errors->has('telefone_comercial') )
											<span style="color: #f56954">{{ $errors->get('telefone_comercial')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group @if($errors->has('celular_1')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'celular_1',
											'nome'			=> 'celular_1',
											'texto'			=> 'Celular 1',
											'valor'			=> old('celular_1') ?? $funcionario->entidade->celular_1 ?? '',
											'tabindex'		=> $tab += 1,
											'atributos'		=> 'data-mask=(99)99999-9999'
										])@endcomponent
										@if( $errors->has('celular_1') )
											<span style="color: #f56954">{{ $errors->get('celular_1')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group @if( $errors->has('celular_2') ) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'celular_2',
											'nome'			=> 'celular_2',
											'texto'			=> 'Celular 2',
											'valor'			=> old('celular_2') ?? $funcionario->entidade->celular_2 ?? '',
											'tabindex'		=> $tab += 1,
											'atributos'		=> 'data-mask=(99)99999-9999'
										])@endcomponent
										@if( $errors->has('celular_2') )
											<span style="color: #f56954">{{ $errors->get('celular_2')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if($errors->has('site')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'site',
											'nome'			=> 'site',
											'texto'			=> 'Site',
											'valor'			=> old('site') ?? $funcionario->entidade->site ?? '',
											'tabindex'		=> $tab += 1
										])@endcomponent
										@if( $errors->has('site') )
											<span style="color: #f56954">{{ $errors->get('site')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group @if($errors->has('email')) has-error @endif">
										@component('formularios.String',[
											'id'			=> 'email',
											'nome'			=> 'email',
											'texto'			=> 'E-mail',
											'valor'			=> old('email') ?? $funcionario->entidade->email ?? '',
											'tabindex'		=> $tab += 1
										])@endcomponent
										@if( $errors->has('email') )
											<span style="color: #f56954">{{ $errors->get('email')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group @if($errors->has('foto')) has-error @endif">
									<div class="col-md-4 col-md-offset-1">
										<label for="foto" class="control-label">Foto</label>
										<input type="file" name="foto" id="foto" value="{{ old('foto') ?? '' }}">
										@if( $errors->has('foto') )
											<span style="color: #f56954">{{ $errors->get('foto')[0] }}</span>
										@endif
									</div>
									<div class="col-md-4 col-md-offset-1">
										<img src="{{ isset($funcionario) ? Storage::url($funcionario->foto) : null }}" alt="Não há foto" height="100px">
									</div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							@component('formularios.enderecos.Endereco',[
								'model'     => $funcionario->entidade ?? null,
								'cidades'   => $cidades,
								'prox_tab'	=> $tab
							])@endcomponent
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										@can("editar_funcionario")
											<button class="btn btn-info" type="submit" id="salvar">
												<i class="fa fa-save"></i> Salvar
											</button>
										@else
											<button disabled class="btn btn-info" type="submit">
												<i class="fa fa-save"></i> Salvar
											</button>
										@endcan
										@can("deletar_funcionario")
											<button class="btn btn-danger" type="button" data-toggle="modal"
													data-target="#modal-excluir">
												<i class="fa fa-trash"></i> Excluir
											</button>
										@else
											<button disabled class="btn btn-danger" type="button" data-toggle="modal"
													data-target="#modal-excluir">
												<i class="fa fa-trash"></i> Excluir
											</button>
										@endcan
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@if( isset($funcionario) )
			<!-- MODAL EXCLUIR FUNCIONARIOS -->
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
							<h4>Deseja realmente excluir o funcionário "{{ $funcionario->nome }}"?</h4>
						</div>

						<div class="modal-footer">
							<button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
							<form method="POST"
								  action="{{ route('entidades.funcionarios.excluir', ['id' => $funcionario->id]) }}">
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

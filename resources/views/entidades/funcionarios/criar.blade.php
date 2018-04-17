@extends('adminlte::page')
@section('title', 'Funcionários - Criar')
@section('content_header')
	<h1>Cadastro
		<small>de funcionário</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
		</li>
		<li>
			<a href="{{ route('entidades.funcionarios.listar') }}"><i class="fa fa-home"></i> Funcionarios</a>
		</li>
		<li class="active">
			<i class="fa fa-plus"></i> Cadastrar funcionário
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
	@can("incluir_funcionario")
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Cadastrar Funcionários</h3>
					</div>
					<div class="box-body">
						<form action="{{ route('entidades.funcionarios.salvar') }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="tipo" class="control-label">Tipo pessoa</label>
										<select name="tipo" id="tipo" class="form-control pula">
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											<option value="CPF" {{ old('tipo') == 'CPF' ? 'selected' : '' }}>
												CPF
											</option>
											<option value="CNPJ" {{ old('tipo') == 'CNPJ' ? 'selected' : '' }}>
												CNPJ
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="cpf_cnpj" class="control-label"
											   @if($errors->has('cpf_cnpj')) style="color: #f56954" @endif>CPF/CNPJ</label>
										<input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control pula"
											   @if($errors->has('cpf_cnpj')) style="border:1px solid #f56954" @endif
											   value="{{ old('cpf_cnpj') ? old('cpf_cnpj') : '' }}">
										@if( $errors->has('cpf_cnpj') )
											<span style="color: #f56954">{{ $errors->get('cpf_cnpj')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="departamento" class="control-label"
											   @if($errors->has('cpf_cnpj')) style="color: #f56954" @endif>Departamento</label>
										<select name="departamento_id" id="departamento" class="form-control pula"
												@if($errors->has('cpf_cnpj')) style="border:1px solid #f56954" @endif>
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($departamentos as $departamento)
												<option value="{{ $departamento->id }}" {{ old('departamento_id') ? 'selected' : '' }}>
													{{ $departamento->descricao }}
												</option>
											@endforeach
										</select>
										@if( $errors->has('departamento_id') )
											<span style="color: #f56954">{{ $errors->get('departamento_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="setor" class="control-label"
											   @if($errors->has('cpf_cnpj')) style="color: #f56954" @endif>Setor</label>
										<select name="setor_id" id="setor" class="form-control pula"
												@if($errors->has('setor_id')) style="border:1px solid #f56954" @endif>
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($setores as $setor)
												<option value="{{ $setor->id }}" {{ old('setor_id') ? old('setor_id') : '' }}>
													{{ $setor->descricao }}
												</option>
											@endforeach
										</select>
										@if( $errors->has('setor_id') )
											<span style="color: #f56954">{{ $errors->get('setor_id')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="nome" class="control-label"
											   @if($errors->has('nome')) style="color: #f56954" @endif>Nome</label>
										<input type="text" name="nome" id="nome" class="form-control pula"
											   @if($errors->has('nome')) style="border:1px solid #f56954" @endif
											   value="{{ old('nome') ? old('nome') : '' }}">
										@if( $errors->has('nome') )
											<span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="apelido" class="control-label"
											   @if($errors->has('apelido')) style="color: #f56954" @endif>Apelido</label>
										<input type="text" name="apelido" id="apelido" class="form-control pula"
											   @if($errors->has('apelido')) style="border:1px solid #f56954" @endif
											   value="{{ old('apelido') ? old('apelido') : '' }}">
										@if( $errors->has('apelido') )
											<span style="color: #f56954">{{ $errors->get('apelido')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="rg_ie" class="control-label"
											   @if($errors->has('rg_ie')) style="color: #f56954" @endif>RGIE</label>
										<input type="text" name="rg_ie" id="rg_ie" class="form-control pula"
											   @if($errors->has('rg_ie')) style="border:1px solid #f56954" @endif
											   value="{{ old('rg_ie') ? old('rg_ie') : '' }}">
										@if( $errors->has('rg_ie') )
											<span style="color: #f56954">{{ $errors->get('rg_ie')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label for="codigo" class="control-label"
											   @if($errors->has('codigo')) style="color: #f56954" @endif>Código</label>
										<input type="text" name="codigo" id="codigo" class="form-control pula"
											   @if($errors->has('codigo')) style="border:1px solid #f56954" @endif
											   value="{{ old('codigo') ? old('codigo') : '' }}">
										@if( $errors->has('codigo') )
											<span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="fantasia" class="control-label cnpj"
											   @if($errors->has('fantasia')) style="color: #f56954" @endif>Fantasia</label>
										<label for="fantasia" class="control-label cnpj"></label>
										<input type="text" name="fantasia" id="fantasia" class="form-control cnpj pula"
											   @if($errors->has('fantasia')) style="border:1px solid #f56954" @endif
											   value="{{ old('fantasia') ? old('fantasia') : '' }}">
										@if( $errors->has('fantasia') )
											<span style="color: #f56954">{{ $errors->get('fantasia')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="inscricao_municipal" class="control-label cnpj"
											   @if($errors->has('inscricao_municipal')) style="color: #f56954" @endif>Inscrição
											municipal</label>
										<input type="text" name="inscricao_municipal" id="inscricao_municipal"
											   class="form-control cnpj pula"
											   @if($errors->has('inscricao_municipal')) style="border:1px solid #f56954"
											   @endif
											   value="{{ old('inscricao_municipal') ? old('inscricao_municipal') : '' }}">
										@if( $errors->has('inscricao_municipal') )
											<span style="color: #f56954">{{ $errors->get('inscricao_municipal')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="ramo_atividade" class="control-label cnpj"
											   @if($errors->has('ramo_atividade')) style="color: #f56954" @endif>Ramo
											atividade</label>
										<input type="text" name="ramo_atividade" id="ramo_atividade"
											   class="form-control cnpj pula"
											   @if($errors->has('ramo_atividade')) style="border:1px solid #f56954"
											   @endif
											   value="{{ old('ramo_atividade') ? old('ramo_atividade') : '' }}">
										@if( $errors->has('ramo_atividade') )
											<span style="color: #f56954">{{ $errors->get('ramo_atividade')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="data_abertura" class="control-label cnpj"
											   @if($errors->has('data_abertura')) style="color: #f56954" @endif>Data
											abertura</label>
										<input type="date" name="data_abertura" id="data_abertura"
											   class="form-control cnpj pula"
											   @if($errors->has('data_abertura')) style="border:1px solid #f56954"
											   @endif
											   value="{{ old('data_abertura') ? old('data_abertura') : '' }}">
										@if( $errors->has('data_abertura') )
											<span style="color: #f56954">{{ $errors->get('data_abertura')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nome_mae" class="control-label cpf"
											   @if($errors->has('nome_mae')) style="color: #f56954" @endif>Nome da
											mãe</label>
										<input type="text" name="nome_mae" id="nome_mae" class="form-control cpf pula"
											   @if($errors->has('nome_mae')) style="border:1px solid #f56954" @endif
											   value="{{ old('nome_mae') ? old('nome_mae') : '' }}">
										@if( $errors->has('nome_mae') )
											<span style="color: #f56954">{{ $errors->get('nome_mae')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="estado_civil_id" class="control-label cpf"
											   @if($errors->has('estado_civil_id')) style="color: #f56954" @endif>Estado
											civil</label>
										<select name="estado_civil_id" id="estado_civil_id"
												@if($errors->has('estado_civil_id')) style="border:1px solid #f56954"
												@endif class="form-control cpf pula">
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($estados_civis as $estados_civil)
												<option value="{{ $estados_civil->id }}" {{ old('estado_civil_id') == $estados_civil->id ? 'selected' : '' }}>
													{{ $estados_civil->descricao }}
												</option>
											@endforeach
										</select>
										@if( $errors->has('estado_civil_id') )
											<span style="color: #f56954">{{ $errors->get('estado_civil_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="regime_casamento_id" class="control-label cpf"
											   @if($errors->has('regime_casamento_id')) style="color: #f56954" @endif>Regime
											casamento</label>
										<select name="regime_casamento_id" id="regime_casamento_id"
												@if($errors->has('regime_casamento_id')) style="border:1px solid #f56954"
												@endif
												class="form-control cpf pula">
											<option value="-1" selected disabled>-----SELECIONE-----</option>
											@foreach($regimes_casamentos as $regime_casamento)
												<option value="{{ $regime_casamento->id }}"
														{{ old('regime_casamento_id') == $regime_casamento->id ? 'selected' : '' }}>
													{{ $regime_casamento->descricao }}</option>
											@endforeach
										</select>
										@if( $errors->has('regime_casamento_id') )
											<span style="color: #f56954">{{ $errors->get('regime_casamento_id')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="profissao" class="control-label cpf"
											   @if($errors->has('profissao')) style="color: #f56954" @endif>Profissão</label>
										<input type="text" name="profissao" id="profissao" class="form-control cpf pula"
											   @if($errors->has('profissao')) style="border:1px solid #f56954" @endif
											   value="{{ old('profissao') ? old('profissao') : '' }}">
										@if( $errors->has('profissao') )
											<span style="color: #f56954">{{ $errors->get('profissao')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="data_nascimento" class="control-label cpf"
											   @if($errors->has('data_nascimento')) style="color: #f56954" @endif>Data
											de nascimento</label>
										<input type="date" name="data_nascimento" id="data_nascimento"
											   class="form-control cpf pula"
											   @if($errors->has('data_nascimento')) style="border:1px solid #f56954"
											   @endif
											   value="{{ old('data_nascimento') ? old('data_nascimento') : '' }}">
										@if( $errors->has('data_nascimento') )
											<span style="color: #f56954">{{ $errors->get('data_nascimento')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nacionalidade" class="control-label cpf"
											   @if($errors->has('nacionalidade')) style="color: #f56954" @endif>Nacionalidade</label>
										<input type="text" name="nacionalidade" id="nacionalidade"
											   @if($errors->has('nacionalidade')) style="border:1px solid #f56954"
											   @endif class="form-control cpf pula"
											   value="{{ old('nacionalidade') ? old('nacionalidade') : '' }}">
										@if( $errors->has('nacionalidade') )
											<span style="color: #f56954">{{ $errors->get('nacionalidade')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="empresa" class="control-label cpf"
											   @if($errors->has('empresa')) style="color: #f56954" @endif>Empresa</label>
										<input type="text" name="empresa" id="empresa" class="form-control cpf pula"
											   @if($errors->has('empresa')) style="border:1px solid #f56954" @endif
											   value="{{ old('empresa') ? old('empresa') : '' }}">
										@if( $errors->has('empresa') )
											<span style="color: #f56954">{{ $errors->get('empresa')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="inss" class="control-label cpf"
											   @if($errors->has('inss')) style="color: #f56954" @endif>INSS</label>
										<input type="text" name="inss" id="inss" class="form-control cpf pula"
											   @if($errors->has('inss')) style="border:1px solid #f56954" @endif
											   value="{{ old('inss') ? old('inss') : '' }}">
										@if( $errors->has('inss') )
											<span style="color: #f56954">{{ $errors->get('inss')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="dependentes" class="control-label cpf"
											   @if($errors->has('dependentes')) style="color: #f56954" @endif>Dependentes</label>
										<input type="number" name="dependentes" id="dependentes"
											   class="form-control cpf pula"
											   @if($errors->has('dependentes')) style="border:1px solid #f56954" @endif
											   value="{{ old('dependentes') ? old('dependentes') : '' }}">
										@if( $errors->has('dependentes') )
											<span style="color: #f56954">{{ $errors->get('dependentes')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="telefone_principal" class="control-label"
											   @if($errors->has('telefone_principal')) style="color: #f56954" @endif>Telefone
											principal</label>
										<input type="text" name="telefone_principal" id="telefone_principal"
											   class="form-control pula"
											   @if($errors->has('telefone_principal')) style="border:1px solid #f56954"
											   @endif
											   value="{{ old('telefone_principal') ? old('telefone_principal') : '' }}">
										@if( $errors->has('telefone_principal') )
											<span style="color: #f56954">{{ $errors->get('telefone_principal')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="telefone_comercial" class="control-label"
											   @if($errors->has('telefone_comercial')) style="color: #f56954" @endif>Telefone
											comercial</label>
										<input type="text" name="telefone_comercial"
											   @if($errors->has('telefone_comercial')) style="border:1px solid #f56954"
											   @endif id="telefone_comercial" class="form-control pula"
											   value="{{ old('telefone_comercial') ? old('telefone_comercial') : '' }}">
										@if( $errors->has('telefone_comercial') )
											<span style="color: #f56954">{{ $errors->get('telefone_comercial')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="celular_1" class="control-label"
											   @if($errors->has('celular_1')) style="color: #f56954" @endif>Celular
											1</label>
										<input type="text" name="celular_1" id="celular_1"
											   @if($errors->has('celular_1')) style="border:1px solid #f56954"
											   @endif class="form-control pula"
											   value="{{ old('celular_1') ? old('celular_1') : '' }}">
										@if( $errors->has('celular_1') )
											<span style="color: #f56954">{{ $errors->get('celular_1')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="celular_2" class="control-label"
											   @if($errors->has('celular_2')) style="color: #f56954" @endif>Celular
											2</label>
										<input type="text" name="celular_2" id="celular_2"
											   @if($errors->has('celular_2')) style="border:1px solid #f56954"
											   @endif class="form-control pula"
											   value="{{ old('celular_2') ? old('celular_2') : '' }}">
										@if( $errors->has('celular_2') )
											<span style="color: #f56954">{{ $errors->get('celular_2')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="site" class="control-label"
											   @if($errors->has('site')) style="color: #f56954" @endif>Site</label>
										<input type="text" name="site" id="site"
											   @if($errors->has('site')) style="border:1px solid #f56954"
											   @endif class="form-control pula"
											   value="{{ old('site') ? old('site') : '' }}">
										@if( $errors->has('site') )
											<span style="color: #f56954">{{ $errors->get('site')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email" class="control-label"
											   @if($errors->has('email')) style="color: #f56954" @endif>E-mail</label>
										<input type="email" name="email" id="email"
											   @if($errors->has('email')) style="border:1px solid #f56954"
											   @endif class="form-control pula"
											   value="{{ old('email') ? old('email') : '' }}">
										@if( $errors->has('email') )
											<span style="color: #f56954">{{ $errors->get('email')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-md-offset-4">
									<label for="foto" class="control-label"
										   @if($errors->has('foto')) style="color: #f56954" @endif>Foto</label>
									<input type="file" name="foto" id="foto"
										   @if($errors->has('foto')) style="border:1px solid #f56954" @endif
										   value="{{ old('foto') ? old('foto') : '' }}">
									@if( $errors->has('foto') )
										<span style="color: #f56954">{{ $errors->get('foto')[0] }}</span>
									@endif
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<!-- ENDEREÇO -->
							<div class="row">
								<div class="col-md-12">
									<div class="box box-primary box-solid">
										<div class="box-header with-border">
											<h3 class="box-title">Endereço</h3>
										</div>
										<div class="box-body">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="CEP" class="control-label"
															   @if($errors->has('cep')) style="color: #f56954" @endif>CEP</label>
														<input id="CEP" type="text" class="form-control pula" name="cep"
															   value="{{ old('cep') }}"
															   @if($errors->has('cep')) style="border:1px solid #f56954" @endif>
														@if( $errors->has('cep') )
															<span style="color: #f56954">{{ $errors->get('cep')[0] }}</span>
														@endif
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group">
														<label for="Logradouro" class="control-label"
															   @if($errors->has('logradouro')) style="color: #f56954" @endif>Logradouro</label>
														<input id="Logradouro" type="text" class="form-control pula"
															   name="logradouro" value="{{ old('logradouro') }}"
															   @if($errors->has('logradouro')) style="border:1px solid #f56954" @endif>
														@if( $errors->has('logradouro') )
															<span style="color: #f56954">{{ $errors->get('logradouro')[0] }}</span>
														@endif
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-2">
													<div class="form-group">
														<label for="Numero" class="control-label"
															   @if($errors->has('numero')) style="color: #f56954" @endif>Número</label>
														<input id="Numero" type="text" class="form-control pula"
															   name="numero" value="{{ old('numero') }}"
															   @if($errors->has('numero')) style="border:1px solid #f56954" @endif>
														@if( $errors->has('numero') )
															<span style="color: #f56954">{{ $errors->get('numero')[0] }}</span>
														@endif
													</div>
												</div>
												<div class="col-md-10">
													<label for="Complemento" class="control-label"
														   @if($errors->has('complemento')) style="color: #f56954" @endif>Complemento</label>
													<input id="Complemento" type="text" class="form-control pula"
														   name="complemento" value="{{ old('complemento') }}"
														   @if($errors->has('complemento')) style="border:1px solid #f56954" @endif>
													@if( $errors->has('complemento') )
														<span style="color: #f56954">{{ $errors->get('complemento')[0] }}</span>
													@endif
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="Bairro" class="control-label"
															   @if($errors->has('bairro')) style="color: #f56954" @endif>Bairro</label>
														<input id="Bairro" type="text" class="form-control pula"
															   name="bairro" value="{{ old('bairro') }}"
															   @if($errors->has('bairro')) style="border:1px solid #f56954" @endif>
														@if( $errors->has('bairro') )
															<span style="color: #f56954">{{ $errors->get('bairro')[0] }}</span>
														@endif
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="CidadeCOD" class="control-label"
															   @if($errors->has('cidade_id')) style="color: #f56954" @endif>Cidade</label>
														<select name="cidade_id" id="CidadeCOD" class="form-control pula select2"
																@if($errors->has('cidade_id')) style="border:1px solid #f56954" @endif>
															<option selected disabled>-------Selecione uma cidade-------</option>
															@foreach($cidades as $cidade)
																<option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : '' }}>
																	{{ $cidade->descricao }} - {{ $cidade->estado->descricao }}
																</option>
															@endforeach
														</select>
														@if( $errors->has('cidade_id') )
															<span style="color: #f56954">{{ $errors->get('cidade_id')[0] }}</span>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<button class="btn btn-primary" type="submit">
											<i class="fa fa-save"></i> Cadastrar
										</button>
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
			$('.select2').select2();
			$("#tipo").focus();

			if ($("select[id=tipo]").val() == 'CNPJ') {
				$(".cnpj").show();
				$(".cpf").hide();
			} else {
				$(".cnpj").hide();
				$(".cpf").show();
			}

			$("select[id=tipo]").on('change', function () {
				if ($("select[id=tipo]").val() == 'CNPJ') {
					$(".cnpj").show();
					$(".cpf").hide();
				} else {
					$(".cnpj").hide();
					$(".cpf").show();
				}
			});
		});
	</script>
@endsection
@extends('adminlte::page')
@section('titulo', 'Empresas - Criar')
@section('content_header')
    <h1>Cadastro <small>de Empresas</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('entidades.empresas.listar') }}"><i class="fa fa-home"></i> Empresas</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar Empresa
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('entidades.empresas.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_empresa")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar Empresa</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('entidades.empresas.salvar') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cpf_cnpj" class="control-label" @if($errors->has('cpf_cnpj')) style="color: #f56954" @endif>CNPJ</label>
                                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" @if($errors->has('cpf_cnpj')) style="border:1px solid #f56954" @endif
											   class="form-control pula" value="{{ old('cpf_cnpj') ? old('cpf_cnpj') : '' }}">
										@if( $errors->has('cpf_cnpj') )
											<span style="color: #f56954">{{ $errors->get('cpf_cnpj')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
										<label for="nome" class="control-label" @if($errors->has('nome')) style="color: #f56954" @endif>Razão social</label>
										<input type="text" name="nome" id="nome" @if($errors->has('nome')) style="border:1px solid #f56954" @endif
										class="form-control cnpj pula" value="{{ old('nome') ? old('nome') : '' }}">
										@if( $errors->has('nome') )
											<span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="rg_ie" class="control-label" @if($errors->has('rg_ie')) style="color: #f56954" @endif>Inscrição estadual</label>
										<input type="text" name="rg_ie" id="rg_ie" @if($errors->has('rg_ie')) style="border:1px solid #f56954" @endif
										class="form-control cnpj pula" value="{{ old('rg_ie') ? old('rg_ie') : '' }}">
										@if( $errors->has('rg_ie') )
											<span style="color: #f56954">{{ $errors->get('rg_ie')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
										<label for="fantasia" class="control-label" @if($errors->has('fantasia')) style="color: #f56954" @endif>Fantasia</label>
										<input type="text" name="fantasia" id="fantasia" class="form-control cnpj pula" @if($errors->has('fantasia')) style="border:1px solid #f56954" @endif
										value="{{ old('fantasia') ? old('fantasia') : '' }}">
										@if( $errors->has('fantasia') )
											<span style="color: #f56954">{{ $errors->get('fantasia')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
										<label for="creci" class="control-label" @if($errors->has('creci')) style="color: #f56954" @endif>Creci</label>
										<input type="text" name="creci" id="creci" class="form-control pula" @if($errors->has('creci')) style="border:1px solid #f56954" @endif
										value="{{ old('creci') ? old('creci') : '' }}">
										@if( $errors->has('creci') )
											<span style="color: #f56954">{{ $errors->get('creci')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="ramo_atividade" class="control-label" @if($errors->has('ramo_atividade')) style="color: #f56954" @endif>Ramo Atividade</label>
										<input type="text" name="ramo_atividade" id="ramo_atividade" @if($errors->has('creci')) style="border:1px solid #f56954" @endif
										class="form-control cnpj pula" value="{{ old('ramo_atividade') ? old('ramo_atividade') : '' }}">
										@if( $errors->has('ramo_atividade') )
											<span style="color: #f56954">{{ $errors->get('ramo_atividade')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="inscricao_municipal" class="control-label" @if($errors->has('inscricao_municipal')) style="color: #f56954" @endif>Inscrição municipal</label>
										<input type="text" name="inscricao_municipal" id="inscricao_municipal" @if($errors->has('inscricao_municipal')) style="border:1px solid #f56954" @endif
										class="form-control cnpj pula" value="{{ old('inscricao_municipal') ? old('inscricao_municipal') : '' }}">
										@if( $errors->has('inscricao_municipal') )
											<span style="color: #f56954">{{ $errors->get('inscricao_municipal')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="data_abertura" class="control-label cnpj" @if($errors->has('data_abertura')) style="color: #f56954" @endif>Data abertura</label>
										<input type="date" name="data_abertura" id="data_abertura" @if($errors->has('data_abertura')) style="border:1px solid #f56954" @endif
										class="form-control cnpj pula" value="{{ old('data_abertura') ? old('data_abertura') : ''  }}">
										@if( $errors->has('data_abertura') )
											<span style="color: #f56954">{{ $errors->get('data_abertura')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
									<label for="telefone_principal" class="control-label" @if($errors->has('telefone_principal')) style="color: #f56954" @endif>Telefone principal</label>
									<input type="text" name="telefone_principal" id="telefone_principal" @if($errors->has('telefone_principal')) style="border:1px solid #f56954" @endif
									class="form-control pula" value="{{ old('telefone_principal') ? old('telefone_principal') : '' }}">
									@if( $errors->has('telefone_principal') )
										<span style="color: #f56954">{{ $errors->get('telefone_principal')[0] }}</span>
									@endif
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="telefone_comercial" class="control-label" @if($errors->has('telefone_comercial')) style="color: #f56954" @endif>Telefone comercial</label>
										<input type="text" name="telefone_comercial"
											   id="telefone_comercial" class="form-control pula" @if($errors->has('telefone_comercial')) style="border:1px solid #f56954" @endif
											   value="{{ old('telefone_comercial') ? old('telefone_comercial') : '' }}">
										@if( $errors->has('telefone_comercial') )
											<span style="color: #f56954">{{ $errors->get('telefone_comercial')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="celular_1" class="control-label" @if($errors->has('celular_1')) style="color: #f56954" @endif>Celular 1</label>
										<input type="text" name="celular_1" id="celular_1" @if($errors->has('celular_1')) style="border:1px solid #f56954" @endif
										class="form-control pula" value="{{ old('celular_1') ? old('celular_1') : '' }}">
										@if( $errors->has('celular_1') )
											<span style="color: #f56954">{{ $errors->get('celular_1')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="celular_2" class="control-label" @if($errors->has('celular_2')) style="color: #f56954" @endif>Celular 2</label>
										<input type="text" name="celular_2" id="celular_2" @if($errors->has('celular_2')) style="border:1px solid #f56954" @endif
										class="form-control pula" value="{{ old('celular_2') ? old('celular_2') : '' }}">
										@if( $errors->has('celular_2') )
											<span style="color: #f56954">{{ $errors->get('celular_2')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="email" class="control-label" @if($errors->has('email')) style="color: #f56954" @endif>E-mail</label>
										<input type="email" name="email" id="email" @if($errors->has('email')) style="border:1px solid #f56954" @endif
										class="form-control pula" value="{{ old('email') ? old('email') : '' }}">
										@if( $errors->has('email') )
											<span style="color: #f56954">{{ $errors->get('email')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="email_nfe" class="control-label" @if($errors->has('email_nfe')) style="color: #f56954" @endif>E-mail NFE</label>
										<input type="email" name="email_nfe" id="email_nfe" @if($errors->has('email_nfe')) style="border:1px solid #f56954" @endif
										class="form-control pula" value="{{ old('email_nfe') ? old('email_nfe') : '' }}">
										@if( $errors->has('email_nfe') )
											<span style="color: #f56954">{{ $errors->get('email_nfe')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="site" class="control-label" @if($errors->has('site')) style="color: #f56954" @endif>Site</label>
										<input type="text" name="site" id="site" @if($errors->has('site')) style="border:1px solid #f56954" @endif
										class="form-control pula" value="{{ old('site') ? old('site') : '' }}">
										@if( $errors->has('site') )
											<span style="color: #f56954">{{ $errors->get('site')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="logo" class="control-label" @if($errors->has('logo_imagem')) style="color: #f56954" @endif>Logo</label>
										<input type="file" name="logo_imagem" id="logo" @if($errors->has('logo_imagem')) style="border:1px solid #f56954" @endif
										class="pula" value="{{ old('logo_imagem') ? old('logo_imagem') : '' }}">
										@if( $errors->has('logo_imagem') )
											<span style="color: #f56954">{{ $errors->get('logo_imagem')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
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
                                                        <label for="CEP" class="control-label" @if($errors->has('cep')) style="color: #f56954" @endif>CEP</label>
                                                        <input id="CEP" type="text" class="form-control pula" name="cep" value="{{ old('cep') }}" @if($errors->has('cep')) style="border:1px solid #f56954" @endif>
                                                        @if( $errors->has('cep') )
                                                            <span style="color: #f56954">{{ $errors->get('cep')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="Logradouro" class="control-label" @if($errors->has('logradouro')) style="color: #f56954" @endif>Logradouro</label>
                                                        <input id="Logradouro" type="text" class="form-control pula" name="logradouro" value="{{ old('logradouro') }}" @if($errors->has('logradouro')) style="border:1px solid #f56954" @endif>
                                                        @if( $errors->has('logradouro') )
                                                            <span style="color: #f56954">{{ $errors->get('logradouro')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="Numero" class="control-label" @if($errors->has('numero')) style="color: #f56954" @endif>Número</label>
                                                        <input id="Numero" type="text" class="form-control pula" name="numero" value="{{ old('numero') }}" @if($errors->has('numero')) style="border:1px solid #f56954" @endif>
                                                        @if( $errors->has('numero') )
                                                            <span style="color: #f56954">{{ $errors->get('numero')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="Complemento" class="control-label" @if($errors->has('complemento')) style="color: #f56954" @endif>Complemento</label>
                                                    <input id="Complemento" type="text" class="form-control pula" name="complemento" value="{{ old('complemento') }}" @if($errors->has('complemento')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('complemento') )
                                                        <span style="color: #f56954">{{ $errors->get('complemento')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Bairro" class="control-label" @if($errors->has('bairro')) style="color: #f56954" @endif>Bairro</label>
                                                        <input id="Bairro" type="text" class="form-control pula" name="bairro" value="{{ old('complemento') }}" @if($errors->has('bairro')) style="border:1px solid #f56954" @endif>
                                                        @if( $errors->has('bairro') )
                                                            <span style="color: #f56954">{{ $errors->get('bairro')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="CidadeCOD" class="control-label" @if($errors->has('cidade_id')) style="color: #f56954" @endif>Cidade</label>
                                                        <select name="cidade_id" id="CidadeCOD" class="form-control pula select2" @if($errors->has('cidade_id')) style="border:1px solid #f56954" @endif>
                                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                                            @foreach($cidades as $cidade)
                                                                <option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : '' }}>{{ $cidade->descricao }}
                                                                    - {{ $cidade->estado->descricao }}</option>
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
                                        @can("incluir_empresa")
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-save"></i> Cadastrar</button>
                                        @else
                                            <button disabled class="btn btn-primary" type="submit">
                                                <i class="fa fa-save"></i> Cadastrar</button>
                                        @endcan
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
            $("#cpf_cnpj").focus();
        });
    </script>
@endsection
@php
	$editar = isset($empresa);
	$tab = 0;
@endphp
@extends('adminlte::page')
@section('title', 'Empresas - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
		<h1>Empresas - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Empresas</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('entidades.empresas.listar') }}"><i class="fa fa-home"></i> Empresas</a>
        </li>
		<li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Empresa
		</li>
    </ol>
@stop
@section('content')
    @can("exibir_empresa")
        <div class="row">
            <div class="col-md-1">
                <a href="{{ route('entidades.empresas.listar') }}" class="btn btn-default">
                    <i class="fa fa-rotate-left"></i> Voltar</a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
						<h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} Empresa</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( isset($condominio) )
							<form method="POST" action="{{ route('entidades.empresas.alterar', ['id' => $empresa->id ]) }}" enctype="multipart/form-data" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('entidades.empresas.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group @if($errors->has('cpf_cnpj')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'cpf_cnpj',
											'nome'		=> 'cpf_cnpj',
											'texto'		=> 'CPF/CNPJ',
											'valor'		=> old('cpf_cnpj') ?? $empresa->entidade->cpf_cnpj ?? '',
											'tabindex'	=> $tab += 1,
											'atributos'	=> 'data-mask=99.999.999/9999-99'
										])@endcomponent
                                        @if( $errors->has('cpf_cnpj') )
                                            <span style="color: #f56954">{{ $errors->get('cpf_cnpj')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group @if($errors->has('nome')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'nome',
											'nome'		=> 'nome',
											'texto'		=> 'Razão social',
											'valor'		=> old('nome') ?? $empresa->entidade->nome ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group @if($errors->has('rg_ie')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'rg_ie',
											'nome'		=> 'rg_ie',
											'texto'		=> 'Inscrição estadual',
											'valor'		=> old('rg_ie') ?? $empresa->entidade->rg_ie ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('rg_ie') )
											<span style="color: #f56954">{{ $errors->get('rg_ie')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group @if($errors->has('fantasia')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'fantasia',
											'nome'		=> 'fantasia',
											'texto'		=> 'Fantasia',
											'valor'		=> old('fantasia') ?? $empresa->entidade->fantasia ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('fantasia') )
											<span style="color: #f56954">{{ $errors->get('fantasia')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group @if($errors->has('creci')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'creci',
											'nome'		=> 'creci',
											'texto'		=> 'Creci',
											'valor'		=> old('creci') ?? $empresa->creci ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('creci') )
											<span style="color: #f56954">{{ $errors->get('creci')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('ramo_atividade')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'ramo_atividade',
											'nome'		=> 'ramo_atividade',
											'texto'		=> 'Ramo Atividade',
											'valor'		=> old('ramo_atividade') ?? $empresa->entidade->ramo_atividade ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('ramo_atividade') )
											<span style="color: #f56954">{{ $errors->get('ramo_atividade')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group @if($errors->has('inscricao_municipal')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'inscricao_municipal',
											'nome'		=> 'inscricao_municipal',
											'texto'		=> 'Inscrição municipal',
											'valor'		=> old('ramo_atividade') ?? $empresa->entidade->inscricao_municipal ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('inscricao_municipal') )
											<span style="color: #f56954">{{ $errors->get('inscricao_municipal')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group @if($errors->has('data_abertura')) has-error @endif">
										@component('formularios.Data',[
											'id'		=> 'data_abertura',
											'nome'		=> 'data_abertura',
											'texto'		=> 'Data abertura',
											'valor'		=> old('data_abertura') ?? (isset($empresa->entidade->data_abertura) ? $empresa->entidade->data_abertura->format('Y-m-d') : ''),
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('data_abertura') )
											<span style="color: #f56954">{{ $errors->get('data_abertura')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group @if($errors->has('telefone_principal')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'telefone_principal',
											'nome'		=> 'telefone_principal',
											'texto'		=> 'Telefone principal',
											'valor'		=> old('telefone_principal') ?? $empresa->entidade->telefone_principal ?? '',
											'tabindex'	=> $tab += 1,
											'atributos'	=> 'data-mask=(99)9999-9999'
										])@endcomponent
										@if( $errors->has('telefone_principal') )
											<span style="color: #f56954">{{ $errors->get('telefone_principal')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group @if($errors->has('telefone_comercial')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'telefone_comercial',
											'nome'		=> 'telefone_comercial',
											'texto'		=> 'Telefone comercial',
											'valor'		=> old('telefone_comercial') ?? $empresa->entidade->telefone_comercial ?? '',
											'tabindex'	=> $tab += 1,
											'atributos'	=> 'data-mask=(99)9999-9999'
										])@endcomponent
										@if( $errors->has('telefone_comercial') )
											<span style="color: #f56954">{{ $errors->get('telefone_comercial')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group @if($errors->has('celular_1')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'celular_1',
											'nome'		=> 'celular_1',
											'texto'		=> 'Celular 1',
											'valor'		=> old('celular_1') ?? $empresa->entidade->celular_1 ?? '',
											'tabindex'	=> $tab += 1,
											'atributos'	=> 'data-mask=(99)99999-9999'
										])@endcomponent
										@if( $errors->has('celular_1') )
											<span style="color: #f56954">{{ $errors->get('celular_1')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<div class="form-group @if($errors->has('celular_2')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'celular_2',
												'nome'		=> 'celular_2',
												'texto'		=> 'Celular 2',
												'valor'		=> old('celular_2') ?? $empresa->entidade->celular_2 ?? '',
												'tabindex'	=> $tab += 1,
												'atributos'	=> 'data-mask=(99)99999-9999'
											])@endcomponent
											@if( $errors->has('celular_2') )
												<span style="color: #f56954">{{ $errors->get('celular_2')[0] }}</span>
											@endif
										</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 @if($errors->has('email')) has-error @endif">
                                    <div class="form-group">
										@component('formularios.Email',[
											'id'		=> 'email',
											'nome'		=> 'email',
											'texto'		=> 'E-mail',
											'valor'		=> old('email') ?? $empresa->entidade->email ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('email') )
											<span style="color: #f56954">{{ $errors->get('email')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('email_nfe')) has-error @endif">
										@component('formularios.Email',[
											'id'		=> 'email_nfe',
											'nome'		=> 'email_nfe',
											'texto'		=> 'E-mail NFE',
											'valor'		=> old('email_nfe') ?? $empresa->email_nfe ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('email_nfe') )
											<span style="color: #f56954">{{ $errors->get('email_nfe')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('site')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'site',
											'nome'		=> 'site',
											'texto'		=> 'Site',
											'valor'		=> old('site') ?? $empresa->entidade->site ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
										@if( $errors->has('site') )
											<span style="color: #f56954">{{ $errors->get('site')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('logo_imagem')) has-error @endif">
										<label for="logo" class="control-label">Logo</label>
                                        <input type="file" name="logo_imagem" id="logo" tabindex="{{ $tab += 1 }}" value="{{ old('logo_imagem') ?? '' }}">
										@if( $errors->has('logo_imagem') )
											<span style="color: #f56954">{{ $errors->get('logo_imagem')[0] }}</span>
										@endif
                                    </div>
                                </div>
								<div class="col-md-4">
									<img src="{{ isset($empresa) ? Storage::url($empresa->logo) : null }}" alt="Não há logo" height="100px">
								</div>
                            </div>
							@component('formularios.enderecos.Endereco',[
								'model'     => $empresa->entidade ?? null,
								'cidades'   => $cidades,
								'prox_tab'	=> $tab
							])@endcomponent
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_empresa")
											@component('formularios.Botao',[
												'classes' 	=> 'btn-info',
												'icone'		=> 'fa fa-save',
												'id'		=> 'salvar',
												'texto'		=> 'Salvar'
											])@endcomponent
                                        @else
											@component('formularios.Botao',[
												'classes' 	=> 'btn-info',
												'icone'		=> 'fa fa-save',
												'id'		=> 'salvar',
												'texto'		=> 'Salvar',
												'atributos'	=> 'disabled'
											])@endcomponent
                                        @endcan
                                        @can("deletar_empresa")
											@component('formularios.Botao',[
												'classes' 	=> 'btn-danger',
												'icone'		=> 'fa fa-trash',
												'texto'		=> 'Excluir',
												'atributos'	=> 'type=button',
												'toggle'	=> 'modal',
												'target'	=> '#modal-excluir'
											])@endcomponent
                                        @else
											@component('formularios.Botao',[
												'classes' 	=> 'btn-danger',
												'icone'		=> 'fa fa-trash',
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
			<!-- MODAL EXCLUIR EMPRESA -->
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
                        <h4>Deseja realmente excluir a Empresa"{{ $empresa->nome }}"?</h4>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST" action="{{ route('entidades.empresas.excluir', ['id' => $empresa->id]) }}">
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
    <script src="{{ asset('js/mask/jquery.mask.min.js') }}"></script>
	<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#cpf_cnpj').focus();
        });
        $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#Celular_1').unmask();
            $('#Celular_2').unmask();
            $('#Telefone_principal').unmask();
            $('#Telefone_comercial').unmask();
            $('#CEP').unmask();
            $('#cpf_cnpj').unmask();
            $('#form').submit();
        });
    </script>
@endsection

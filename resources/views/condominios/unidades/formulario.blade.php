@php
	$editar = isset($unidade);
@endphp
@extends('adminlte::page')
@section('title', 'Unidades - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
    	<h1>Unidades - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Unidades</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.unidades.listar',['idCondominio' => $condominio->id ]) }}"><i class="fa fa-home"></i> Unidades</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Unidade
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
			@component('formularios.Link',[
				'texto'		=> 'Voltar',
				'icone'		=> 'fa fa-rotate-left',
				'link'		=> route('condominios.unidades.listar',['idCondominio' => $condominio->id ]),
				'classes'	=> 'btn btn-default'
			])
			@endcomponent
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados do Condomínios -> {{ $condominio->nome }} - {{ $condominio->apelido }}</h3>
                    <div class="box-tools pull-right">
						@component('formularios.Botao', [
							'classes'		=> 'btn-box-tool',
							'atributos'		=> 'type=button data-widget=collapse',
							'icone'			=> 'fa fa-minus'
						])@endcomponent
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
								@component('formularios.String',[
									'id'		=> 'condominio',
									'nome'		=> 'condominio',
									'texto'		=> 'Condomínio',
									'valor'		=> $condominio->nome ?? '',
									'tabindex'	=> '1',
									'atributos'	=> 'disabled'
								])@endcomponent
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								@component('formularios.String',[
									'id'		=> 'apelido',
									'nome'		=> 'apelido',
									'texto'		=> 'Apelido',
									'valor'		=> $condominio->apelido ?? '',
									'tabindex'	=> '2',
									'atributos'	=> 'disabled'
								])@endcomponent
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
								@component('formularios.String',[
									'id'		=> 'codigo',
									'nome'		=> 'codigo',
									'texto'		=> 'Código',
									'valor'		=> $condominio->id ?? '',
									'tabindex'	=> '3',
									'atributos'	=> 'disabled'
								])@endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can("exibir_unidade")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
							{{ $editar ? 'Editar' : 'Cadastrar' }} unidade
						</h3>
                        <div class="box-tools pull-right">
							@component('formularios.Botao', [
	                            'classes'		    => 'btn-box-tool',
							    'atributos'		=> 'type=button data-widget=collapse',
							    'icone'			=> 'fa fa-minus'
						 	])@endcomponent
                        </div>
                    </div>
                    <div class="box-body">
						@if( $editar )
							<form method="POST" action="{{ route('condominios.unidades.alterar', ['id' => $unidade->id, 'idCondominio' => $condominio->id ]) }}">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('condominios.unidades.salvar',['idCondominio' => $condominio->id]) }}">
								{{ csrf_field() }}
                                @component('formularios.Hidden',[
                                    'valor' => old('condominio_id') ?? $condominio->id,
                                    'id'    => 'condominio_id',
                                    'nome'  => 'condominio_id',
                                ])@endcomponent
						@endif
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group @if($errors->has('bloco')) has-error @endif">
                                    @component('formularios.String',[
                                        'nome' 		=> 'bloco',
                                        'id'		=> 'bloco',
                                        'texto'		=> 'Bloco/Quadra',
                                        'tabindex'	=> '1',
                                        'valor'		=> old('bloco') ?? $unidade->bloco ?? null,
                                        'titulo'    => 'Informe bloco ou quadra'
                                    ])@endcomponent
                                    @if( $errors->has('bloco') )
                                        <span style="color: #f56954">{{ $errors->get('bloco')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group @if($errors->has('unidade')) has-error @endif">
                                    @component('formularios.String',[
                                        'nome' 		=> 'unidade',
                                        'id'		=> 'unidade',
                                        'texto'		=> 'Unidade',
                                        'tabindex'	=> '2',
                                        'valor'		=> old('unidade') ?? $unidade->unidade ?? null,
                                        'titulo'    => 'Informe unidade/lote'
                                    ])@endcomponent
                                    @if( $errors->has('unidade') )
                                        <span style="color: #f56954">{{ $errors->get('unidade')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->has('tipo_imovel_id')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'tipo_imovel_id',
                                        'id'		=> 'tipo_imovel_id',
                                        'tabindex'	=> '3',
                                        'texto'		=> 'Tipo de Imóvel',
                                        'classes'	=> 'select2',
                                    ])
                                        <option selected disabled>===============SELECIONE===============</option>
                                        @if ( $editar )
                                            @foreach($tiposimoveis as $tipoimovel)
                                                <option value="{{ $tipoimovel->id }}" {{ $unidade->tipo_imovel_id == $tipoimovel->id ? 'selected' : '' }}>
                                                    {{ $tipoimovel->descricao }}</option>
                                            @endforeach
                                        @else
                                            @foreach($tiposimoveis as $tipoimovel)
                                                <option value="{{ $tipoimovel->id }}" >
                                                    {{ $tipoimovel->descricao }}</option>
                                            @endforeach
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('tipo_imovel_id') )
                                        <span style="color: #f56954">{{ $errors->get('tipo_imovel_id')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group @if($errors->has('garagem')) has-error @endif">
                                    @component('formularios.String',[
                                        'id'		=> 'garagem',
                                        'nome'		=> 'garagem',
                                        'valor'		=> old('garagem') ?? $unidade->garagem ?? null,
                                        'texto'		=> 'Qde Garagem',
                                        'tabindex'	=> '4',
                                        'titulo'    => 'Informe a quantidade de garagens'
                                    ])@endcomponent
                                    @if( $errors->has('garagem') )
                                        <span style="color: #f56954">{{ $errors->get('garagem')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group @if($errors->has('bloquear_acesso')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'bloquear_acesso',
                                        'id'		=> 'bloquear_acesso',
                                        'tabindex'	=> '5',
                                        'texto'		=> 'Bloquear Acesso?'
                                    ])
                                    <option value="-1" selected disabled>=====SELECIONE=====</option>
                                    @if ( $editar )
                                        <option value="Sim"
                                            {{ old('bloquar_acesso') == 'Sim' ? 'selected' : ($unidade->bloquear_acesso == 'Sim' ? 'selected' : '') }}>
                                            Sim
                                        </option>
                                        <option value="Nao"
                                                {{ old('bloquar_acesso') == 'Nao' ? 'selected' : ($unidade->bloquear_acesso == 'Nao' ? 'selected' : '') }}>
                                            Nao
                                        </option>
                                    @else
                                        <option value="Sim"
                                                {{ old('bloquar_acesso') == 'Sim' ? 'selected' : '' }}>
                                            Sim
                                        </option>
                                        <option value="Nao"
                                                {{ old('bloquar_acesso') == 'Nao' ? 'selected' : '' }}>
                                            Nao
                                        </option>
                                    @endif
                                    @endcomponent
                                    @if( $errors->has('bloquear_acesso') )
                                        <span style="color: #f56954">{{ $errors->get('bloquear_acesso')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @if($errors->has('area_util')) has-error @endif">
                                    @component('formularios.String',[
                                        'nome' 		=> 'area_util',
                                        'id'		=> 'area_util',
                                        'texto'		=> 'Área Útil (m2) ',
                                        'tabindex'	=> '6',
                                        'valor'		=> old('area_util') ?? $unidade->area_util ?? null,
                                        'titulo'    => 'Informe a área útil'
                                    ])@endcomponent
                                    @if( $errors->has('area_util') )
                                        <span style="color: #f56954">{{ $errors->get('area_util')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->has('area_total')) has-error @endif">
                                    @component('formularios.String',[
                                        'nome' 		=> 'area_total',
                                        'id'		=> 'area_total',
                                        'texto'		=> 'Área Total (m2) ',
                                        'tabindex'	=> '7',
                                        'valor'		=> old('area_total') ?? $unidade->area_total ?? null,
                                        'titulo'    => 'Informe a área total'
                                    ])@endcomponent
                                    @if( $errors->has('area_total') )
                                        <span style="color: #f56954">{{ $errors->get('area_total')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if($errors->has('indice')) has-error @endif">
                                    @component('formularios.String',[
                                        'nome' 		=> 'indice',
                                        'id'		=> 'indice',
                                        'texto'		=> 'Índice (%)',
                                        'tabindex'	=> '8',
                                        'valor'		=> old('indice') ?? $unidade->indice ?? null,
                                        'titulo'    => 'Informe o índice'
                                    ])@endcomponent
                                    @if( $errors->has('indice') )
                                        <span style="color: #f56954">{{ $errors->get('indice')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"> Dados do Proprietário </h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group @if($errors->has('proprietario_id')) has-error @endif">
                                                    @component('formularios.Select', [
                                                        'nome' 		=> 'proprietario_id',
                                                        'id'		=> 'proprietario_id',
                                                        'tabindex'	=> '9',
                                                        'texto'		=> 'Proprietário',
                                                        'classes'	=> 'select2',
                                                    ])
                                                        <option selected disabled>===============SELECIONE===============</option>
                                                        @if ( $editar )
                                                            @foreach($proprietarios as $proprietario)
                                                                <option value="{{ $proprietario->id }}" {{ $unidade->proprietario_id == $proprietario->id ? 'selected' : '' }}>
                                                                    {{ $proprietario->entidade->nome }}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($proprietarios as $proprietario)
                                                                <option value="{{ $proprietario->id }}" >
                                                                    {{ $proprietario->entidade->nome }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endcomponent
                                                    @if( $errors->has('proprietario_id') )
                                                        <span style="color: #f56954">{{ $errors->get('proprietario_id')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'apelido_proprietario',
                                                        'nome'      => 'apelido_proprietario',
                                                        'texto'     => 'Apelido',
                                                        'valor'     => old('apelido_proprietario') ?? $unidade->proprietario->entidade->apelido ?? null,
                                                        'atributos' => 'disabled'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'cpfcnpj_proprietario',
                                                        'nome'      => 'cpfcnpj_proprietario',
                                                        'texto'     => 'CPF/CNPJ',
                                                        'valor'     => old('cpfcnpj_proprietario') ?? $unidade->proprietario->entidade->cpf_cnpj ?? null,
                                                        'atributos' => 'disabled'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'rgie_proprietario',
                                                        'nome'      => 'rgie_proprietario',
                                                        'texto'     => 'RG/IE',
                                                        'valor'     => old('rgie_proprietario') ?? $unidade->proprietario->entidade->rg_ie ?? null,
                                                        'atributos' => 'disabled'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'foneprincipal_proprietario',
                                                        'nome'      => 'foneprincipal_proprietario',
                                                        'texto'     => 'Fone Principal',
                                                        'valor'     => old('foneprincipal_proprietario') ?? $unidade->proprietario->entidade->telefone_principal ?? null,
                                                        'atributos' => 'disabled data-mask=(00)0000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'fonecomercial_proprietario',
                                                        'nome'      => 'fonecomercial_proprietario',
                                                        'texto'     => 'Fone Comercial',
                                                        'valor'     => old('fonecomercial_proprietario') ?? $unidade->proprietario->entidade->telefone_comercial ?? null,
                                                        'atributos' => 'disabled data-mask=(00)0000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'celular1_proprietario',
                                                        'nome'      => 'celular1_proprietario',
                                                        'texto'     => 'Celular 1',
                                                        'valor'     => old('celular1_proprietario') ?? $unidade->proprietario->entidade->celular_1 ?? null,
                                                        'atributos' => 'disabled data-mask=(00)00000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'celular2_proprietario',
                                                        'nome'      => 'celular2_proprietario',
                                                        'texto'     => 'Celular 2',
                                                        'valor'     => old('celular2_proprietario') ?? $unidade->proprietario->entidade->celular_2 ?? null,
                                                        'atributos' => 'disabled data-mask=(00)00000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"> Dados do Inquilino </h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group @if($errors->has('inquilino_id')) has-error @endif">
                                                    @component('formularios.Select', [
                                                        'nome' 		=> 'inquilino_id',
                                                        'id'		=> 'inquilino_id',
                                                        'tabindex'	=> '10',
                                                        'texto'		=> 'Inquilino',
                                                        'classes'	=> 'select2',
                                                    ])
                                                        <option selected disabled>===============SELECIONE===============</option>
                                                        @if ( $editar )
                                                            @foreach($inquilinos as $inquilino)
                                                                <option value="{{ $inquilino->id }}" {{ $unidade->inquilino_id == $inquilino->id ? 'selected' : '' }}>
                                                                    {{ $inquilino->entidade->nome }}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($inquilinos as $inquilino)
                                                                <option value="{{ $inquilino->id }}" >
                                                                    {{ $inquilino->entidade->nome }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endcomponent
                                                    @if( $errors->has('inquilino_id') )
                                                        <span style="color: #f56954">{{ $errors->get('inquilino_id')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'apelido_inquilino',
                                                        'nome'      => 'apelido_inquilino',
                                                        'texto'     => 'Apelido',
                                                        'valor'     => old('apelido_inquilino') ?? $unidade->inquilino->entidade->apelido ?? null,
                                                        'atributos' => 'disabled'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'cpfcnpj_inquilino',
                                                        'nome'      => 'cpfcnpj_inquilino',
                                                        'texto'     => 'CPF/CNPJ',
                                                        'valor'     => old('cpfcnpj_inquilino') ?? $unidade->inquilino->entidade->cpf_cnpj ?? null,
                                                        'atributos' => 'disabled'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'rgie_inquilino',
                                                        'nome'      => 'rgie_inquilino',
                                                        'texto'     => 'RG/IE',
                                                        'valor'     => old('rgie_inquilino') ?? $unidade->inquilino->entidade->rg_ie ?? null,
                                                        'atributos' => 'disabled'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'foneprincipal_inquilino',
                                                        'nome'      => 'foneprincipal_inquilino',
                                                        'texto'     => 'Fone Principal',
                                                        'valor'     => old('foneprincipal_inquilino') ?? $unidade->inquilino->entidade->telefone_principal ?? null,
                                                        'atributos' => 'disabled data-mask=(00)0000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'fonecomercial_inquilino',
                                                        'nome'      => 'fonecomercial_inquilino',
                                                        'texto'     => 'Fone Comercial',
                                                        'valor'     => old('fonecomercial_inquilino') ?? $unidade->inquilino->entidade->telefone_comercial ?? null,
                                                        'atributos' => 'disabled data-mask=(00)0000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'celular1_inquilino',
                                                        'nome'      => 'celular1_inquilino',
                                                        'texto'     => 'Celular 1',
                                                        'valor'     => old('celular1_inquilino') ?? $unidade->inquilino->entidade->celular_1 ?? null,
                                                        'atributos' => 'disabled data-mask=(00)00000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    @component('formularios.String',[
                                                        'id'        => 'celular2_inquilino',
                                                        'nome'      => 'celular2_inquilino',
                                                        'texto'     => 'Celular 2',
                                                        'valor'     => old('celular2_inquilino') ?? $unidade->inquilino->entidade->celular_2 ?? null,
                                                        'atributos' => 'disabled data-mask=(00)00000-0000'
                                                    ])@endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('imobiliaria')) has-error @endif">
                                                    @component('formularios.String',[
                                                        'id'		=> 'imobiliaria',
                                                        'nome'		=> 'imobiliaria',
                                                        'valor'		=> old('imobiliaria') ?? $unidade->imobiliaria ?? null,
                                                        'texto'		=> 'Imobiliária',
                                                        'tabindex'	=> '11',
                                                        'titulo'    => 'Informe a imobiliária'
                                                    ])@endcomponent
                                                    @if( $errors->has('imobiliaria') )
                                                        <span style="color: #f56954">{{ $errors->get('imobiliaria')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('imobiliaria_contato')) has-error @endif">
                                                    @component('formularios.String',[
                                                        'id'		=> 'imobiliaria_contato',
                                                        'nome'		=> 'imobiliaria_contato',
                                                        'valor'		=> old('imobiliaria_contato') ?? $unidade->imobiliaria_contato ?? null,
                                                        'texto'		=> 'Imobiliária - Contato',
                                                        'tabindex'	=> '12',
                                                        'titulo'    => 'Informe o contato da imobiliária'
                                                    ])@endcomponent
                                                    @if( $errors->has('imobiliaria_contato') )
                                                        <span style="color: #f56954">{{ $errors->get('imobiliaria_contato')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('boleto_impresso')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'boleto_impresso',
                                        'id'		=> 'boleto_impresso',
                                        'tabindex'	=> '13',
                                        'texto'		=> 'Boleto Impresso',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Sim"
                                                    {{ old('boleto_impresso') == 'Sim' ? 'selected' : ($unidade->boleto_impresso == 'Sim' ? 'selected' : '') }}>
                                                Sim
                                            </option>
                                            <option value="Nao"
                                                    {{ old('boleto_impresso') == 'Nao' ? 'selected' : ($unidade->boleto_impresso == 'Nao' ? 'selected' : '') }}>
                                                Nao
                                            </option>
                                        @else
                                            <option value="Sim"
                                                    {{ old('boleto_impresso') == 'Sim' ? 'selected' : '' }}>
                                                Sim
                                            </option>
                                            <option value="Nao"
                                                    {{ old('boleto_impresso') == 'Nao' ? 'selected' : '' }}>
                                                Nao
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('boleto_impresso') )
                                        <span style="color: #f56954">{{ $errors->get('boleto_impresso')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('boleto_impresso_destino')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'boleto_impresso_destino',
                                        'id'		=> 'boleto_impresso_destino',
                                        'tabindex'	=> '14',
                                        'texto'		=> 'Enviar boleto impresso para',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Portaria"
                                                    {{ old('boleto_impresso_destino') == 'Portaria' ? 'selected' : ($unidade->boleto_impresso_destino == 'Portaria' ? 'selected' : '') }}>
                                                Portaria
                                            </option>
                                            <option value="Correios"
                                                    {{ old('boleto_impresso_destino') == 'Correios' ? 'selected' : ($unidade->boleto_impresso_destino == 'Correios' ? 'selected' : '') }}>
                                                Correios
                                            </option>
                                        @else
                                            <option value="Portaria"
                                                    {{ old('boleto_impresso_destino') == 'Portaria' ? 'selected' : '' }}>
                                                Portaria
                                            </option>
                                            <option value="Correios"
                                                    {{ old('boleto_impresso_destino') == 'Correios' ? 'selected' : '' }}>
                                                Correios
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('boleto_impresso_destino') )
                                        <span style="color: #f56954">{{ $errors->get('boleto_impresso_destino')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('boleto_email')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'boleto_email',
                                        'id'		=> 'boleto_email',
                                        'tabindex'	=> '15',
                                        'texto'		=> 'Enviar boleto por e-mail',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Sim"
                                                    {{ old('boleto_email') == 'Sim' ? 'selected' : ($unidade->boleto_email == 'Sim' ? 'selected' : '') }}>
                                                Sim
                                            </option>
                                            <option value="Nao"
                                                    {{ old('boleto_email') == 'Nao' ? 'selected' : ($unidade->boleto_email == 'Nao' ? 'selected' : '') }}>
                                                Nao
                                            </option>
                                        @else
                                            <option value="Sim"
                                                    {{ old('boleto_email') == 'Sim' ? 'selected' : '' }}>
                                                Sim
                                            </option>
                                            <option value="Nao"
                                                    {{ old('boleto_email') == 'Nao' ? 'selected' : '' }}>
                                                Nao
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('boleto_email') )
                                        <span style="color: #f56954">{{ $errors->get('boleto_email')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('boleto_email_destino')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'boleto_email_destino',
                                        'id'		=> 'boleto_email_destino',
                                        'tabindex'	=> '16',
                                        'texto'		=> 'Enviar email para',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Proprietario"
                                                    {{ old('boleto_email_destino') == 'Proprietario' ? 'selected' : ($unidade->boleto_email_destino == 'Proprietario' ? 'selected' : '') }}>
                                                Proprietário
                                            </option>
                                            <option value="Inquilino"
                                                    {{ old('boleto_email_destino') == 'Inquilino' ? 'selected' : ($unidade->boleto_email_destino == 'Inquilino' ? 'selected' : '') }}>
                                                Inquilino
                                            </option>
                                            <option value="Todos"
                                                    {{ old('boleto_email_destino') == 'Todos' ? 'selected' : ($unidade->boleto_email_destino == 'Todos' ? 'selected' : '') }}>
                                                Todos
                                            </option>
                                        @else
                                            <option value="Proprietario"
                                                    {{ old('boleto_email_destino') == 'Proprietario' ? 'selected' : '' }}>
                                                Proprietário
                                            </option>
                                            <option value="Inquilino"
                                                    {{ old('boleto_email_destino') == 'Inquilino' ? 'selected' : '' }}>
                                                Inquilino
                                            </option>
                                            <option value="Todos"
                                                    {{ old('boleto_email_destino') == 'Todos' ? 'selected' : '' }}>
                                                Todos
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('boleto_email_destino') )
                                        <span style="color: #f56954">{{ $errors->get('boleto_email_destino')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('convocacao')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'convocacao',
                                        'id'		=> 'convocacao',
                                        'tabindex'	=> '17',
                                        'texto'		=> 'Enviar convocação',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Portaria"
                                                    {{ old('convocacao') == 'Portaria' ? 'selected' : ($unidade->convocacao == 'Portaria' ? 'selected' : '') }}>
                                                Portaria
                                            </option>
                                            <option value="Correios"
                                                    {{ old('convocacao') == 'Correios' ? 'selected' : ($unidade->convocacao == 'Correios' ? 'selected' : '') }}>
                                                Correios
                                            </option>
                                        @else
                                            <option value="Portaria"
                                                    {{ old('convocacao') == 'Portaria' ? 'selected' : '' }}>
                                                Portaria
                                            </option>
                                            <option value="Correios"
                                                    {{ old('convocacao') == 'Correios' ? 'selected' : '' }}>
                                                Correios
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('convocacao') )
                                        <span style="color: #f56954">{{ $errors->get('convocacao')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('convocacao_destino')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'convocacao_destino',
                                        'id'		=> 'convocacao_destino',
                                        'tabindex'	=> '18',
                                        'texto'		=> 'Enviar convocação para',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Proprietario"
                                                    {{ old('convocacao_destino') == 'Proprietario' ? 'selected' : ($unidade->convocacao_destino == 'Proprietario' ? 'selected' : '') }}>
                                                Proprietário
                                            </option>
                                            <option value="Inquilino"
                                                    {{ old('convocacao_destino') == 'Inquilino' ? 'selected' : ($unidade->convocacao_destino == 'Inquilino' ? 'selected' : '') }}>
                                                Inquilino
                                            </option>
                                            <option value="Todos"
                                                    {{ old('convocacao_destino') == 'Todos' ? 'selected' : ($unidade->convocacao_destino == 'Todos' ? 'selected' : '') }}>
                                                Todos
                                            </option>
                                        @else
                                            <option value="Proprietario"
                                                    {{ old('convocacao_destino') == 'Proprietario' ? 'selected' : '' }}>
                                                Proprietário
                                            </option>
                                            <option value="Inquilino"
                                                    {{ old('convocacao_destino') == 'Inquilino' ? 'selected' : '' }}>
                                                Inquilino
                                            </option>
                                            <option value="Todos"
                                                    {{ old('convocacao_destino') == 'Todos' ? 'selected' : '' }}>
                                                Todos
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('convocacao_destino') )
                                        <span style="color: #f56954">{{ $errors->get('convocacao_destino')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('correspondencia')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'correspondencia',
                                        'id'		=> 'correspondencia',
                                        'tabindex'	=> '19',
                                        'texto'		=> 'Enviar Correspondencia',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Portaria"
                                                    {{ old('correspondencia') == 'Portaria' ? 'selected' : ($unidade->correspondencia == 'Portaria' ? 'selected' : '') }}>
                                                Portaria
                                            </option>
                                            <option value="Correios"
                                                    {{ old('correspondencia') == 'Correios' ? 'selected' : ($unidade->correspondencia == 'Correios' ? 'selected' : '') }}>
                                                Correios
                                            </option>
                                        @else
                                            <option value="Portaria"
                                                    {{ old('correspondencia') == 'Portaria' ? 'selected' : '' }}>
                                                Portaria
                                            </option>
                                            <option value="Correios"
                                                    {{ old('correspondencia') == 'Correios' ? 'selected' : '' }}>
                                                Correios
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('correspondencia') )
                                        <span style="color: #f56954">{{ $errors->get('correspondencia')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if($errors->has('correspondencia_destino')) has-error @endif">
                                    @component('formularios.Select', [
                                        'nome' 		=> 'correspondencia_destino',
                                        'id'		=> 'correspondencia_destino',
                                        'tabindex'	=> '20',
                                        'texto'		=> 'Enviar correspondencia para',
                                    ])
                                        <option value="-1" selected disabled> Selecione </option>
                                        @if ( $editar )
                                            <option value="Proprietario"
                                                    {{ old('correspondencia_destino') == 'Proprietario' ? 'selected' : ($unidade->correspondencia_destino == 'Proprietario' ? 'selected' : '') }}>
                                                Proprietário
                                            </option>
                                            <option value="Inquilino"
                                                    {{ old('correspondencia_destino') == 'Inquilino' ? 'selected' : ($unidade->correspondencia_destino == 'Inquilino' ? 'selected' : '') }}>
                                                Inquilino
                                            </option>
                                            <option value="Todos"
                                                    {{ old('correspondencia_destino') == 'Todos' ? 'selected' : ($unidade->correspondencia_destino == 'Todos' ? 'selected' : '') }}>
                                                Todos
                                            </option>
                                        @else
                                            <option value="Proprietario"
                                                    {{ old('correspondencia_destino') == 'Proprietario' ? 'selected' : '' }}>
                                                Proprietário
                                            </option>
                                            <option value="Inquilino"
                                                    {{ old('correspondencia_destino') == 'Inquilino' ? 'selected' : '' }}>
                                                Inquilino
                                            </option>
                                            <option value="Todos"
                                                    {{ old('correspondencia_destino') == 'Todos' ? 'selected' : '' }}>
                                                Todos
                                            </option>
                                        @endif
                                    @endcomponent
                                    @if( $errors->has('correspondencia_destino') )
                                        <span style="color: #f56954">{{ $errors->get('correspondencia_destino')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @can("editar_unidade")
                                        <button class="btn btn-info" type="submit">
                                            <i class="fa fa-save"></i> Salvar</button>
                                    @else
                                        <button disabled class="btn btn-info" type="submit">
                                            <i class="fa fa-save"></i> Salvar</button>
                                    @endcan
									@if ( $editar )
										@can("deletar_unidade")
											<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
												<i class="fa fa-trash"></i> Excluir</button>
										@else
											<button disabled class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
												<i class="fa fa-trash"></i> Excluir</button>
										@endcan
									@endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

		@if( $editar )
			<!-- MODAL EXCLUIR UNIDADES -->
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
                            <p>Bloco:   {{ $unidade->bloco }}</p>
                            <p>Unidade: {{ $unidade->unidade }}</p>
                            <p>Proprietário:   {{ $unidade->proprietario->entidade->nome }}</p>
						</div>

						<div class="modal-footer">
							<button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
							<form method="POST" action="{{ route('condominios.unidades.excluir', ['id' => $unidade->id, 'idCondominio' => $condominio->id]) }}">
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
            $('#bloco').focus();
			$('#boleto_email_destino').attr('disabled',true);
            $('#proprietario_id').on( 'change', function () {
				let proprietario_id = $('#proprietario_id').val();
				let url = '/Entidades/Proprietarios/GetProprietario/'+proprietario_id;
				$.ajax({
					method: "GET",
					url: url
				}).done( function ( retorno ) {
					$('#apelido_proprietario').val( retorno.apelido );
					$('#cpfcnpj_proprietario').val( retorno.cpf_cnpj );
					$('#rgie_proprietario').val( retorno.rg_ie );
					$('#foneprincipal_proprietario').val( retorno.telefone_principal );
					$('#fonecomercial_proprietario').val( retorno.telefone_comercial );
					$('#celular1_proprietario').val( retorno.celular_1 );
					$('#celular2_proprietario').val( retorno.celular_2 );
				});
            });

			if ( $(this).val() == 'Nao' ) {
				$('#boleto_email_destino').attr('disabled',true);
			} else {
				$('#boleto_email_destino').attr('disabled',false);
			}

			$('#boleto_email').on('change', function () {
				if ( $(this).val() == 'Nao' ) {
					$('#boleto_email_destino').attr('disabled',true);
				} else {
					$('#boleto_email_destino').attr('disabled',false);
				}
			});

			$('#inquilino_id').on( 'change', function () {
				let inquilino_id = $('#inquilino_id').val();
				let url = '/Entidades/Inquilinos/GetInquilino/'+inquilino_id;
				$.ajax({
					method: "GET",
					url: url
				}).done( function ( retorno ) {
					$('#apelido_inquilino').val( retorno.apelido );
					$('#cpfcnpj_inquilino').val( retorno.cpf_cnpj );
					$('#rgie_inquilino').val( retorno.rg_ie );
					$('#foneprincipal_inquilino').val( retorno.telefone_principal );
					$('#fonecomercial_inquilino').val( retorno.telefone_comercial );
					$('#celular1_inquilino').val( retorno.celular_1 );
					$('#celular2_inquilino').val( retorno.celular_2 );
				});
			});
        });
    </script>
@endsection

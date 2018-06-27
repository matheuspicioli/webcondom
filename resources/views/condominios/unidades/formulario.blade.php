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
            <a href="{{ route('condominios.unidades.listar',['idCondominio' => $condominio->id ]) }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados do Condomínios -> {{ $condominio->nome }} - {{ $condominio->apelido }}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condominio" class="control-label">Condomínio</label>
                                <input id="condominio" type="text" class="form-control pula" name="condominio"
                                       disabled="disabled" value="{{ $condominio->nome }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apelido" class="control-label">Apelido</label>
                                <input id="apelido" type="text" class="form-control pula" name="apelido"
                                       disabled="disabled" value="{{ $condominio->apelido }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="codigo" class="control-label">Código</label>
                                <input id="codigo" type="text" class="form-control pula" name="codigo"
                                       disabled="disabled" value="{{ $condominio->id }}">
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
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( isset($unidade) )
							<form method="POST" action="{{ route('condominios.unidades.alterar', ['id' => $unidade->id, 'idCondominio' => $condominio->id ]) }}">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('condominios.unidades.salvar',['idCondominio' => $condominio->id]) }}">
								{{ csrf_field() }}
                                <input type="hidden" value="{{ old('condominio_id') ? old('condominio_id') : $condominio->id }}" name="condominio_id">
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
                                        @if ( isset($unidade) )
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
                                    <option value="-1" selected disabled>===============SELECIONE===============</option>
                                    @if ( isset($unidade) )
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
                                                        @if ( isset($unidade) )
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
                                                    <label for="apelido_proprietario" class="control-label">Apelido</label>
                                                    <input id="apelido_proprietario" type="text" class="form-control pula" name="apelido_proprietario"
                                                           disabled="disabled" value="{{ old('apelido_proprietario') ?? $unidade->proprietario->entidade->apelido ?? null    }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="cpfcnpj_proprietario" class="control-label">CPF/CNPJ</label>
                                                    <input id="cpfcnpj_proprietario" type="text" class="form-control pula" name="cpfcnpj_proprietario"
                                                           disabled="disabled" value="{{ old('cpfcnpj_proprietario') ??$unidade->proprietario->entidade->cpf_cnpj ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="rgie_proprietario" class="control-label">RG/IE</label>
                                                    <input id="rgie_proprietario" type="text" class="form-control pula" name="rgie_proprietario"
                                                           disabled="disabled" value="{{ old('rgie_proprietario') ?? $unidade->proprietario->entidade->rg_ie ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="foneprincipal_proprietario" class="control-label">Fone Principal</label>
                                                    <input id="foneprincipal_proprietario" type="text" class="form-control pula" name="foneprincipal_proprietario"
                                                           disabled="disabled" value="{{ old('foneprincipal_proprietario') ?? $unidade->proprietario->entidade->fone_principal ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="fonecomercial_proprietario" class="control-label">Fone Comercial</label>
                                                    <input id="fonecomercial_proprietario" type="text" class="form-control pula" name="fonecomercial_proprietario"
                                                           disabled="disabled" value="{{ old('fonecomercial_proprietario') ?? $unidade->proprietario->entidade->fone_comercial ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="celular1_proprietario" class="control-label">Celular 1</label>
                                                    <input id="celular1_proprietario" type="text" class="form-control pula" name="celular1_proprietario"
                                                           disabled="disabled" value="{{ old('celular1_proprietario') ?? $unidade->proprietario->entidade->celular_1 ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="celular2_proprietario" class="control-label">Celular 2</label>
                                                    <input id="celular2_proprietario" type="text" class="form-control pula" name="celular2_proprietario"
                                                           disabled="disabled" value="{{ old('celular2_proprietario') ?? $unidade->proprietario->entidade->celular_2 ?? null }}">
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
                                                        @if ( isset($unidade) )
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
                                                    <label for="apelido_inquilino" class="control-label">Apelido</label>
                                                    <input id="apelido_inquilino" type="text" class="form-control pula" name="apelido_inquilino"
                                                           disabled="disabled" value="{{ old('apelido_inquilino') ?? $unidade->inquilino->entidade->apelido ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="cpfcnpj_inquilino" class="control-label">CPF/CNPJ</label>
                                                    <input id="cpfcnpj_inquilino" type="text" class="form-control pula" name="cpfcnpj_inquilino"
                                                           disabled="disabled" value="{{ old('cpfcnpj_inquilino') ?? $unidade->inquilino->entidade->cpf_cnpj ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="rgie_inquilino" class="control-label">RG/IE</label>
                                                    <input id="rgie_inquilino" type="text" class="form-control pula" name="rgie_inquilino"
                                                           disabled="disabled" value="{{ old('rgie_inquilino') ?? $unidade->inquilino->entidade->rg_ie ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="foneprincipal_inquilino" class="control-label">Fone Principal</label>
                                                    <input id="foneprincipal_inquilino" type="text" class="form-control pula" name="foneprincipal_inquilino"
                                                           disabled="disabled" value="{{ old('foneprincipal_inquilino') ?? $unidade->inquilino->entidade->fone_principal ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="fonecomercial_inquilino" class="control-label">Fone Comercial</label>
                                                    <input id="fonecomercial_inquilino" type="text" class="form-control pula" name="fonecomercial_inquilino"
                                                           disabled="disabled" value="{{ old('fonecomercial_inquilino') ?? $unidade->inquilino->entidade->fone_comercial ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="celular1_inquilino" class="control-label">Celular 1</label>
                                                    <input id="celular1_inquilino" type="text" class="form-control pula" name="celular1_inquilino"
                                                           disabled="disabled" value="{{ old('celular1_inquilino') ?? $unidade->inquilino->entidade->celular_1 ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="celular2_inquilino" class="control-label">Celular 2</label>
                                                    <input id="celular2_inquilino" type="text" class="form-control pula" name="celular2_inquilino"
                                                           disabled="disabled" value="{{ old('celular2_inquilino') ?? $unidade->inquilino->entidade->celular_2 ?? null }}">
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
                                    @if ( isset($unidade) )
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
                                        @if ( isset($unidade) )
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
                                        @if ( isset($unidade) )
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
                                        @if ( isset($unidade) )
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
                                        @if ( isset($unidade) )
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
                                        @if ( isset($unidade) )
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
                                        @if ( isset($unidade) )
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
                                        @if ( isset($unidade) )
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
                                    @can("deletar_unidade")
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                            <i class="fa fa-trash"></i> Excluir</button>
                                    @else
                                        <button disabled class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                            <i class="fa fa-trash"></i> Excluir</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>
    <script>
        $(document).ready(function () {
            $('#bloco').focus();
        });
    </script>
@endsection

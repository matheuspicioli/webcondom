@extends('adminlte::page')
@section('titulo', 'Imóveis - Exibir/Alterar')
@section('content_header')
    <h1>Imóveis - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.imoveis.listar') }}"><i class="fa fa-home"></i> Imóveis </a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Imóvel
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.imoveis.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("exibir_imovel")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Imóveis</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ route('condominios.imoveis.alterar', ['id' => $imovel->id ]) }}" id="form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Codigo" class="control-label" @if($errors->has('codigo')) style="color: #f56954" @endif>Código</label>
                                        <input id="Codigo" type="text" class="form-control pula" name="codigo"
                                               data-mask="999999" value="{{ old('codigo') ? old('codigo') : $imovel->codigo }}"
											   tabindex="1"
											   @if($errors->has('codigo')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('codigo') )
                                            <span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="referencia" class="control-label" @if($errors->has('referencia')) style="color: #f56954" @endif>Referência</label>
										<input id="referencia" type="text" class="form-control pula" name="referencia"
											   tabindex="2"
											   value="{{ old('referencia') ? old('referencia') : $imovel->referencia }}" @if($errors->has('referencia')) style="border:1px solid #f56954" @endif>
										@if( $errors->has('referencia') )
											<span style="color: #f56954">{{ $errors->get('referencia')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tipo_imovel" class="control-label" @if($errors->has('tipo_imovel_id')) style="color: #f56954" @endif>Tipo imóvel</label>
                                        <select id="tipo_imovel" class="form-control pula select2" name="tipo_imovel_id" tabindex="3">
                                            @foreach($tiposImoveis as $tipoImovel)
												<option value="{{ $tipoImovel->id }}" {{ old('tipo_imovel_id') == $tipoImovel->id ? 'selected' : ($tipoImovel->id == $imovel->tipo_imovel_id ? 'selected' : '') }}>
													{{ $tipoImovel->descricao }}
												</option>
                                            @endforeach
                                        </select>
										@if( $errors->has('tipo_imovel_id') )
											<span style="color: #f56954">{{ $errors->get('tipo_imovel_id')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="categoria" class="control-label" @if($errors->has('categoria')) style="color: #f56954" @endif>Categoria</label>
                                        <select id="categoria" class="form-control pula select2" name="categoria_id" tabindex="4">
                                            @foreach($categorias as $categoria)
												<option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : ($categoria->id == $imovel->categoria_id ? 'selected' : '') }}>
													{{ $categoria->descricao }}
												</option>
                                            @endforeach
                                        </select>
										@if( $errors->has('categoria_id') )
											<span style="color: #f56954">{{ $errors->get('categoria_id')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="condominio" class="control-label" @if($errors->has('condominio_id')) style="color: #f56954" @endif>Condomínio</label>
                                        <select id="condominio" class="form-control pula select2" name="condominio_id" tabindex="5">
                                            @foreach($condominios as $condominio)
												<option value="{{ $condominio->id }}" {{ old('condominio_id') == $condominio->id ? 'selected' : ($condominio->id == $imovel->condominio_id ? 'selected' : '') }}>
													{{ $condominio->nome }}
												</option>
                                            @endforeach
                                        </select>
										@if( $errors->has('condominio_id') )
											<span style="color: #f56954">{{ $errors->get('condominio_id')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="valor_locacao" class="control-label" @if($errors->has('valor_locacao')) style="color: #f56954" @endif>Valor de locação</label>
                                        <input id="valor_locacao" type="text" class="form-control pula" name="valor_locacao" placeholder="0,00"
											   tabindex="6"
                                               value="{{ old('valor_locacao') ? old('valor_locacao') : $imovel->valor_locacao_view }}">
										@if( $errors->has('valor_locacao') )
											<span style="color: #f56954">{{ $errors->get('valor_locacao')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="valor_venda" class="control-label" @if($errors->has('valor_venda')) style="color: #f56954" @endif>Valor de venda</label>
                                        <input id="valor_venda" type="text" class="form-control pula" name="valor_venda" placeholder="0,00"
											   tabindex="7"
                                               value="{{ old('valor_venda') ? old('valor_venda') : $imovel->valor_venda_view }}">
										@if( $errors->has('valor_venda') )
											<span style="color: #f56954">{{ $errors->get('valor_venda')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="codigo_agua" class="control-label" @if($errors->has('codigo_agua')) style="color: #f56954" @endif>Código água</label>
                                        <input id="codigo_agua" type="text" class="form-control pula" maxlength="20"
											   tabindex="8"
                                               name="codigo_agua" value="{{ old('valor_venda') ? old('valor_venda') : $imovel->codigo_agua }}">
										@if( $errors->has('codigo_agua') )
											<span style="color: #f56954">{{ $errors->get('codigo_agua')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="codigo_iptu" class="control-label" @if($errors->has('codigo_iptu')) style="color: #f56954" @endif>Código IPTU</label>
                                        <input id="codigo_iptu" type="text" class="form-control pula" maxlength="20"
											   tabindex="9"
                                               name="codigo_iptu" value="{{ old('codigo_iptu') ? old('codigo_iptu') : $imovel->codigo_iptu }}">
										@if( $errors->has('codigo_iptu') )
											<span style="color: #f56954">{{ $errors->get('codigo_iptu')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="codigo_energia" class="control-label" @if($errors->has('codigo_energia')) style="color: #f56954" @endif>Código água</label>
                                        <input id="codigo_energia" type="text" class="form-control pula" maxlength="20"
											   tabindex="10"
                                               name="codigo_energia" value="{{ old('codigo_energia') ? old('codigo_energia') : $imovel->codigo_energia }}">
										@if( $errors->has('codigo_energia') )
											<span style="color: #f56954">{{ $errors->get('codigo_energia')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
										<label for="descritivo" class="control-label" @if($errors->has('descritivo')) style="color: #f56954" @endif>Descritivo</label>
                                        <textarea name="descritivo" id="descritivo" class="form-control pula" rows="4"
												  tabindex="11"
												  @if($errors->has('descritivo')) style="border:1px solid #f56954" @endif>
											{{ old('descritivo') ? old('descritivo') : $imovel->descritivo }}
										</textarea>
										@if( $errors->has('descritivo') )
											<span style="color: #f56954">{{ $errors->get('descritivo')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            @component('formularios.enderecos.Endereco',[
                            	'model'     => $imovel,
                            	'cidades'   => $cidades,
                            	'prox_tab'	=> '12'
                            ])@endcomponent
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_imovel")
                                            <button class="btn btn-info" type="submit" id="salvar">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @endcan
                                        @can("deletar_imovel")
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                                <i class="fa fa-trash"></i> Excluir
                                            </button>
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
    <!-- MODAL EXCLUIR CONDOMÍNIO -->
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


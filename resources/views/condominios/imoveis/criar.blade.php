@extends('adminlte::page')
@section('titulo', 'Imóveis - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de Imóveis</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.imoveis.listar') }}"><i class="fa fa-home"></i> Imóveis</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar imóvel
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
    @can("incluir_imovel")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar imóvel</h3>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('condominios.imoveis.salvar') }}" method="POST" id="form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Codigo" class="control-label" @if($errors->has('codigo')) style="color: #f56954" @endif>Código</label>
                                        <input id="Codigo" type="text" class="form-control pula" name="codigo"
                                               data-mask="999999" value="{{ old('codigo') }}" @if($errors->has('codigo')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('codigo') )
                                            <span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="referencia" class="control-label" @if($errors->has('referencia')) style="color: #f56954" @endif>Referência</label>
                                        <input id="referencia" type="text" class="form-control pula" name="referencia" value="{{ old('referencia') }}" @if($errors->has('referencia')) style="border:1px solid #f56954" @endif>
										@if( $errors->has('referencia') )
											<span style="color: #f56954">{{ $errors->get('referencia')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
										<label for="tipo_imovel" class="control-label" @if($errors->has('tipo_imovel_id')) style="color: #f56954" @endif>Tipo de imóvel</label>
                                        <select name="tipo_imovel_id" id="tipo_imovel" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($tiposImoveis as $tipoImovel)
                                                <option value="{{ $tipoImovel->id }}" {{ old('tipo_imovel_id') ? 'selected' : '' }}>
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
										<label for="categoria_imovel" class="control-label" @if($errors->has('categoria_id')) style="color: #f56954" @endif>Categoria do imóvel</label>
                                        <select name="categoria_id" id="categoria_imovel" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" {{ old('categoria_id') ? 'selected' : '' }}>
													{{ $categoria->descricao }}</option>
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
                                        <select name="condominio_id" id="condominio" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($condominios as $condominio)
                                                <option value="{{ $condominio->id }}" {{ old('condominio_id') ? 'selected' : '' }}>
													{{ $condominio->nome }}</option>
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
                                        <input id="valor_locacao" type="text" class="form-control pula" name="valor_locacao" value="{{ old('valor_locacao') }}" @if($errors->has('valor_locacao')) style="border:1px solid #f56954" @endif
                                               placeholder="0,00">
										@if( $errors->has('valor_locacao') )
											<span style="color: #f56954">{{ $errors->get('valor_locacao')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="valor_venda" class="control-label" @if($errors->has('valor_venda')) style="color: #f56954" @endif>Valor de venda</label>
                                        <input id="valor_venda" type="text" class="form-control pula" name="valor_venda" value="{{ old('valor_venda') }}" @if($errors->has('valor_venda')) style="border:1px solid #f56954" @endif
                                               placeholder="0,00">
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
                                        <input id="codigo_agua" type="text" class="form-control pula" maxlength="20" value="{{ old('codigo_agua') }}" @if($errors->has('codigo_agua')) style="border:1px solid #f56954" @endif
                                               name="codigo_agua">
										@if( $errors->has('codigo_agua') )
											<span style="color: #f56954">{{ $errors->get('codigo_agua')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label for="codigo_iptu" class="control-label" @if($errors->has('codigo_iptu')) style="color: #f56954" @endif>Código IPTU</label>
                                        <input id="codigo_iptu" type="text" class="form-control pula" maxlength="20" value="{{ old('codigo_iptu') }}" @if($errors->has('codigo_iptu')) style="border:1px solid #f56954" @endif
                                               name="codigo_iptu">
										@if( $errors->has('codigo_iptu') )
											<span style="color: #f56954">{{ $errors->get('codigo_iptu')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo_energia" class="control-label" @if($errors->has('codigo_energia')) style="color: #f56954" @endif>Código energia</label>
                                        <input id="codigo_energia" type="text" class="form-control pula" maxlength="20" value="{{ old('codigo_energia') }}" @if($errors->has('codigo_energia')) style="border:1px solid #f56954" @endif
                                               name="codigo_energia">
										@if( $errors->has('codigo_energia') )
											<span style="color: #f56954">{{ $errors->get('codigo_energia')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
										<label for="descritivo" class="control-label" @if($errors->has('descritivo')) style="color: #f56954" @endif>Descritivo</label>
                                        <textarea name="descritivo" id="descritivo" value="{{ old('descritivo') }}" @if($errors->has('descritivo')) style="border:1px solid #f56954" @endif
												  class="form-control pula" rows="2">
										</textarea>
										@if( $errors->has('descritivo') )
											<span style="color: #f56954">{{ $errors->get('descritivo')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
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
													   <input id="CEP" type="text" class="form-control pula" name="cep"
                                                              data-mask="99999-999" value="{{ old('cep') }}" @if($errors->has('cep')) style="border:1px solid #f56954" @endif>
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
													   <input id="Bairro" type="text" class="form-control pula" name="bairro" value="{{ old('bairro') }}" @if($errors->has('bairro')) style="border:1px solid #f56954" @endif>
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
                                        <button class="btn btn-primary" type="submit" id="salvar">
                                            <i class="fa fa-save"></i> Cadastrar</button>
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
                        <h3 class="box-title">Você não possui acesso a este recurso. entre em contato com o administrador!</h3>
                    </div>
                </div>
            </div>
        </div>
    @endcan

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#Codigo').focus();
        });
        $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#CEP').unmask();
            $('#form').submit();
        });

    </script>
@endsection

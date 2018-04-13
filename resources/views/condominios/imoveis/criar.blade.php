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
                                        <label for="codigo" class="control-label">Código</label>
                                        <input id="codigo" type="text" class="form-control pula" name="codigo">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="referencia" class="control-label">Referência</label>
                                        <input id="referencia" type="text" class="form-control pula" name="referencia">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tipo_imovel" class="control-label">Tipo de imóvel</label>
                                        <select name="tipo_imovel_id" id="tipo_imovel" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($tiposImoveis as $tipoImovel)
                                                <option value="{{ $tipoImovel->id }}">{{ $tipoImovel->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="categoria_imovel" class="control-label">Categoria do imóvel</label>
                                        <select name="categoria_id" id="categoria_imovel" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="condominio" class="control-label">Condomínio</label>
                                        <select name="condominio_id" id="condominio" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($condominios as $condominio)
                                                <option value="{{ $condominio->id }}">{{ $condominio->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="valor_locacao" class="control-label">Valor de locação</label>
                                        <input id="valor_locacao" type="text" class="form-control pula" name="valor_locacao"
                                               placeholder="0,00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="valor_venda" class="control-label">Valor de venda</label>
                                        <input id="valor_venda" type="text" class="form-control pula" name="valor_venda"
                                               placeholder="0,00">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo_agua" class="control-label">Código água</label>
                                        <input id="codigo_agua" type="text" class="form-control pula" maxlength="20"
                                               name="codigo_agua">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo_iptu" class="control-label">Código IPTU</label>
                                        <input id="codigo_iptu" type="text" class="form-control pula" maxlength="20"
                                               name="codigo_iptu">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo_energia" class="control-label">Código energia</label>
                                        <input id="codigo_energia" type="text" class="form-control pula" maxlength="20"
                                               name="codigo_energia">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="descritivo" class="control-label pula">Descritivo</label>
                                        <textarea name="descritivo" id="descritivo" class="form-control pula" rows="2"></textarea>
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
                                                   <label for="CEP" class="control-label">CEP</label>
                                                   <input type="text" id="CEP" name="cep" class="form-control pula">
                                                   <span class="help-block">Apenas os números</span>
                                               </div>
                                           </div>

                                           <div class="col-md-8">
                                               <div class="form-group">
                                                   <label for="Logradouro" class="control-label">Logradouro</label>
                                                   <input id="Logradouro" type="text" class="form-control pula" name="logradouro">
                                               </div>
                                           </div>
                                        </div>
                                        <div class="row">
                                           <div class="col-md-2">
                                               <div class="form-group">
                                                   <label for="Numero" class="control-label">Número</label>
                                                   <input type="text" id="Numero" name="numero" class="form-control pula">
                                               </div>
                                           </div>
                                           <div class="col-md-10">
                                               <div class="form-group">
                                                   <label for="Complemento" class="control-label">Complemento</label>
                                                   <input type="text" id="Complemento" name="complemento" class="form-control pula">
                                               </div>
                                           </div>
                                        </div>
                                        <div class="row">
                                           <div class="col-md-4">
                                               <div class="form-group">
                                                   <label for="Bairro" class="control-label">Bairro</label>
                                                   <input type="text" id="Bairro" name="bairro" class="form-control pula">
                                               </div>
                                           </div>
                                           <div class="col-md-8">
                                               <div class="form-group">
                                                   <label for="CidadeCOD" class="control-label">Cidade</label>
                                                   <select name="cidade_id" id="CidadeCOD" class="form-control pula">
                                                       <option selected disabled>-------Selecione uma cidade-------</option>
                                                       @foreach($cidades as $cidade)
                                                           <option value="{{ $cidade->id }}">{{ $cidade->descricao }} - {{ $cidade->estado->sigla }}</option>
                                                       @endforeach
                                                   </select>
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
            $("#codigo").focus();
            $('#CEP').mask('00000-000');
        });
        $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#CEP').unmask();
            $('#form').submit();
        });

    </script>
@endsection

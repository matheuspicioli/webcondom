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
                    <form method="POST" action="{{ route('condominios.imoveis.alterar', ['id' => $imovel->id ]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="codigo" class="control-label">Código</label>
                                    <input id="codigo" type="text" class="form-control pula" name="codigo"
                                           value="{{ $imovel->codigo }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="referencia" class="control-label">Referência</label>
                                    <input id="referencia" type="text" class="form-control pula" name="referencia"
                                           value="{{ $imovel->referencia }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tipo_imovel" class="control-label">Tipo de imóvel</label>
                                    <select id="tipo_imovel" class="form-control pula" name="tipo_imovel_id">
                                        @foreach($tiposImoveis as $tipoImovel)
                                            <option value="{{ $tipoImovel->id }}" {{$tipoImovel->id == $imovel->tipo_imovel_id ? 'selected' : '' }}>
                                                {{ $tipoImovel->descricao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="categoria" class="control-label">Categoria</label>
                                    <select id="categoria" class="form-control pula" name="categoria_id">
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{$categoria->id == $imovel->categoria_id ? 'selected' : '' }}>
                                                {{ $categoria->descricao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="condominio" class="control-label">Condomínio</label>
                                    <select id="condominio" class="form-control pula" name="condominio_id">
                                        @foreach($condominios as $condominio)
                                            <option value="{{ $condominio->id }}" {{$condominio->id == $imovel->condominio_id ? 'selected' : '' }}>
                                                {{ $condominio->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valor_locacao" class="control-label">Valor de locação</label>
                                    <input id="valor_locacao" type="text" class="form-control pula" name="valor_locacao" placeholder="1000000000,00"
                                           value="{{ $imovel->valor_locacao }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valor_venda" class="control-label">Valor de venda</label>
                                    <input id="valor_venda" type="text" class="form-control pula" name="valor_venda" placeholder="1000000000,00"
                                           value="{{ $imovel->valor_venda }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo_agua" class="control-label">Código água</label>
                                    <input id="codigo_agua" type="text" class="form-control pula" maxlength="20"
                                           name="codigo_agua" value="{{ $imovel->codigo_agua }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo_iptu" class="control-label">Código IPTU</label>
                                    <input id="codigo_iptu" type="text" class="form-control pula" maxlength="20"
                                           name="codigo_iptu" value="{{ $imovel->codigo_iptu }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo_energia" class="control-label">Código água</label>
                                    <input id="codigo_energia" type="text" class="form-control pula" maxlength="20"
                                           name="codigo_energia" value="{{ $imovel->codigo_energia }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label for="descritivo" class="control-label pula">Descritivo</label>
                                    <textarea name="descritivo" id="descritivo" class="form-control pula" rows="4">{{ $imovel->descritivo }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Endereço</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="CEP" class="control-label">CEP</label>
                                        <input type="text" id="CEP" name="cep" class="form-control pula"
                                               value="{{ $imovel->endereco->cep }}">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="Logradouro" class="control-label">Logradouro</label>
                                        <input id="Logradouro" type="text" class="form-control pula" name="logradouro"
                                               value="{{ $imovel->endereco->logradouro }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Numero" class="control-label">Número</label>
                                        <input type="number" min="0" id="Numero" name="numero" class="form-control pula"
                                               value="{{ $imovel->endereco->numero }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="Complemento" class="control-label">Complemento</label>
                                        <input type="text" id="Complemento" name="complemento" class="form-control pula"
                                               value="{{ $imovel->endereco->complemento ? $imovel->endereco->complemento : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Bairro" class="control-label">Bairro</label>
                                        <input type="text" id="Bairro" name="bairro" class="form-control pula"
                                               value="{{ $imovel->endereco->bairro }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="CidadeCOD" class="control-label">Cidade</label>
                                        <select name="cidade_id" id="CidadeCOD" class="form-control pula">
                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                            @foreach($cidades as $cidade)
                                                <option value="{{ $cidade->id }}" {{ $cidade->id == $imovel->endereco->cidade->id ? 'selected' : '' }}>{{ $cidade->descricao }}
                                                    - {{ $cidade->estado->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-save"></i> Salvar</button>
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        $(document).ready(function () {
            $('#Codigo').focus();
            });
    </script>
@endsection


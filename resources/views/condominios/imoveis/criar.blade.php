@extends('layouts.app')
@section('titulo', 'Imóveis - Cadastrar')
@section('conteudo')
    <pagina tamanho="12">
        <painel cor="panel-primary" titulo="Cadastrar imóvel">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('condominios.imoveis.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario action="{{ route('condominios.imoveis.salvar') }}" method="POST" token="{{ csrf_token() }}">
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
                                   placeholder="1000000000,00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="valor_venda" class="control-label">Valor de venda</label>
                            <input id="valor_venda" type="text" class="form-control pula" name="valor_venda"
                                   placeholder="1000000000,00">
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
                            <textarea name="descritivo" id="descritivo" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- PARTE FORMULÁRIO ENDEREÇO --}}

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
                            <input type="number" min="0" id="Numero" name="numero" class="form-control pula">
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="Complemento" class="control-label">Complemento</label>
                            <input type="text" id="Complemento" name="complemento" class="form-control pula">
                            <span class="help-block">Este campo é opcional</span>
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

                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $("#codigo").focus();
        });
    </script>
@endsection
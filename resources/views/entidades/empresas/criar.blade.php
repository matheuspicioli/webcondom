@extends('layouts.app')
@section('titulo', 'Empresas - Criar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Cadastrar empresa">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('entidades.empresas.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="POST" action="{{ route('entidades.empresas.salvar') }}" token="{{ csrf_token() }}"
                        enctype="multipart/form-data">
                <input type="hidden" name="tipo" value="CNPJ">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cpf_cnpj" class="control-label">CNPJ</label>
                            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="razao_social" class="control-label cnpj">Razão social</label>
                            <input type="text" name="razao_social" id="razao_social" class="form-control cnpj">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inscricao_estadual" class="control-label cnpj">Inscrição estadual</label>
                            <input type="text" name="inscricao_estadual" id="inscricao_estadual" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="fantasia" class="control-label cnpj">Fantasia</label>
                            <input type="text" name="fantasia" id="fantasia" class="form-control cnpj">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="creci" class="control-label">Creci</label>
                            <input type="text" name="creci" id="creci" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ramo_atividade" class="control-label cnpj">Ramo Atividade</label>
                            <input type="text" name="ramo_atividade" id="ramo_atividade" class="form-control cnpj">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inscricao_municipal" class="control-label cnpj">Inscrição municipal</label>
                            <input type="text" name="inscricao_municipal" id="inscricao_municipal"
                                   class="form-control cnpj">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="data_abertura" class="control-label cnpj">Data abertura</label>
                            <input type="date" name="data_abertura" id="data_abertura" class="form-control cnpj">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefone_principal" class="control-label">Telefone principal</label>
                            <input type="text" name="telefone_principal" id="telefone_principal" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefone_comercial" class="control-label">Telefone comercial</label>
                            <input type="text" name="telefone_comercial" id="telefone_comercial" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="celular_1" class="control-label">Celular 1</label>
                            <input type="text" name="celular_1" id="celular_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="celular_2" class="control-label">Celular 2</label>
                            <input type="text" name="celular_2" id="celular_2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_nfe" class="control-label">E-mail NFE</label>
                            <input type="email" name="email_nfe" id="email_nfe" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site" class="control-label">Site</label>
                            <input type="text" name="site" id="site" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="logo" class="control-label">Logo</label>
                            <input type="file" name="logo_imagem" id="logo" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <!-- ENDEREÇO PRINCIPAL-->
                <h4 class="text-center">Endereço</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cep" class="control-label">CEP</label>
                            <input type="text" id="cep" name="cep" class="form-control pula">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="logradouro" class="control-label">Logradouro</label>
                            <input id="logradouro" type="text" class="form-control pula" name="logradouro">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="numero" class="control-label">Número</label>
                            <input type="number" min="0" id="numero" name="numero" class="form-control pula">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="complemento" class="control-label">Complemento</label>
                            <input type="text" id="complemento" name="complemento" class="form-control pula">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bairro" class="control-label">Bairro</label>
                            <input type="text" id="bairro" name="bairro" class="form-control pula">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="cidade_id_principal" class="control-label">Cidade</label>
                            <select name="cidade_id" id="cidade_id_principal" class="form-control pula">
                                <option selected disabled>-------Selecione uma cidade-------</option>
                                @foreach($cidades as $cidade)
                                    <option value="{{ $cidade->id }}">{{ $cidade->descricao }}
                                        - {{ $cidade->estado->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
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
            $("#cpf_cnpj").focus();
        });
    </script>
@endsection
@extends('layouts.app')
@section('titulo', 'Proprietários - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Alterar proprietário">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('entidades.proprietarios.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="PUT" action="{{ route('entidades.proprietarios.alterar', ['id' => $proprietario->id]) }}" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Tipo pessoa</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="-1" selected disabled>-----SELECIONE-----</option>
                                <option value="CPF" {{ $proprietario->entidade->tipo == 'CPF' ? 'selected' : '' }}>CPF</option>
                                <option value="CNPJ" {{ $proprietario->entidade->tipo == 'CNPJ' ? 'selected' : '' }}>CNPJ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf_cnpj" class="control-label">CPF/CNPJ</label>
                            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" value="{{ $proprietario->entidade->cpf_cnpj }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="{{ $proprietario->entidade->nome }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="apelido" class="control-label">Apelido</label>
                            <input type="text" name="apelido" id="apelido" class="form-control" value="{{ $proprietario->entidade->apelido }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rg_ie" class="control-label">RGIE</label>
                            <input type="text" name="rg_ie" id="rg_ie" class="form-control" value="{{ $proprietario->entidade->rg_ie }}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="codigo" class="control-label">Código</label>
                            <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $proprietario->codigo }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="fantasia" class="control-label cnpj">Fantasia</label>
                            <input type="text" name="fantasia" id="fantasia" class="form-control cnpj" value="{{ $proprietario->entidade->fantasia }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inscricao_municipal" class="control-label cnpj">Inscrição municipal</label>
                            <input type="text" name="inscricao_municipal" id="inscricao_municipal"
                                   class="form-control cnpj" value="{{ $proprietario->entidade->inscricao_municipal }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="ramo_atividade" class="control-label cnpj">Ramo Atividade</label>
                            <input type="text" name="ramo_atividade" id="ramo_atividade"
                                   class="form-control cnpj" value="{{ $proprietario->entidade->ramo_atividade }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_abertura" class="control-label cnpj">Data abertura</label>
                            <input type="date" name="data_abertura" id="data_abertura"
                                   class="form-control cnpj" value="{{ $proprietario->entidade->data_abertura }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome_mae" class="control-label cpf">Nome da mãe</label>
                            <input type="text" name="nome_mae" id="nome_mae" class="form-control cpf" value="{{ $proprietario->entidade->nome_mae }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado_civil_id" class="control-label cpf">Estado civil</label>
                            <select name="estado_civil_id" id="estado_civil_id" class="form-control cpf">
                                <option value="-1" selected disabled>-----SELECIONE-----</option>
                                @foreach($estados_civis as $estados_civil)
                                    <option value="{{ $estados_civil->id }}" {{ $proprietario->entidade->estado_civil_id == $estados_civil->id ? 'selected' : '' }}>
                                        {{ $estados_civil->descricao }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="regime_casamento_id" class="control-label cpf">Regime casamento</label>
                            <select name="regime_casamento_id" id="regime_casamento_id" class="form-control cpf">
                                <option value="-1" selected disabled>-----SELECIONE-----</option>
                                @foreach($regimes_casamentos as $regime_casamento)
                                    <option value="{{ $regime_casamento->id }}" {{ $proprietario->entidade->regime_casamento_id == $regime_casamento->id ? 'selected' : '' }}>
                                        {{ $regime_casamento->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="profissao" class="control-label cpf">Profissão</label>
                            <input type="text" name="profissao" id="profissao" class="form-control cpf" value="{{ $proprietario->entidade->profissao }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_nascimento" class="control-label cpf">Data de nascimento</label>
                            <input type="date" name="data_nascimento" id="data_nascimento"
                                   class="form-control cpf" value="{{ $proprietario->entidade->data_nascimento }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nacionalidade" class="control-label cpf">Nacionalidade</label>
                            <input type="text" name="nacionalidade" id="nacionalidade"
                                   class="form-control cpf" value="{{ $proprietario->entidade->nacionalidade }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="empresa" class="control-label cpf">Empresa</label>
                            <input type="text" name="empresa" id="empresa"
                                   class="form-control cpf" value="{{ $proprietario->entidade->empresa }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inss" class="control-label cpf">INSS</label>
                            <input type="text" name="inss" id="inss" class="form-control cpf" value="{{ $proprietario->entidade->inss }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="dependentes" class="control-label cpf">Dependentes</label>
                            <input type="number" name="dependentes" id="dependentes"
                                   class="form-control cpf" value="{{ $proprietario->entidade->dependentes }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefone_principal" class="control-label">Telefone principal</label>
                            <input type="text" name="telefone_principal" id="telefone_principal"
                                   class="form-control" value="{{ $proprietario->entidade->telefone_principal }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefone_comercial" class="control-label">Telefone comercial</label>
                            <input type="text" name="telefone_comercial"
                                   id="telefone_comercial" class="form-control" value="{{ $proprietario->entidade->telefone_comercial }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="celular_1" class="control-label">Celular 1</label>
                            <input type="text" name="celular_1" id="celular_1"
                                   class="form-control" value="{{ $proprietario->entidade->celular_1 }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="celular_2" class="control-label">Celular 2</label>
                            <input type="text" name="celular_2" id="celular_2"
                                   class="form-control" value="{{ $proprietario->entidade->celular_2 }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site" class="control-label">Site</label>
                            <input type="text" name="site" id="site"
                                   class="form-control" value="{{ $proprietario->entidade->site }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <input type="email" name="email" id="email"
                                   class="form-control" value="{{ $proprietario->entidade->email }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- ENDEREÇO PRINCIPAL-->
                <h4 class="text-center">Endereço principal</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cep" class="control-label">CEP</label>
                            <input type="text" id="cep" name="cep_principal"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_principal->cep }}">
                            <span class="help-block">Apenas os números</span>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="logradouro" class="control-label">Logradouro</label>
                            <input id="logradouro" type="text" class="form-control pula"
                                   name="logradouro_principal" value="{{ $proprietario->entidade->endereco_principal->logradouro }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="numero" class="control-label">Número</label>
                            <input type="number" min="0" id="numero" name="numero_principal"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_principal->numero }}">
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="complemento" class="control-label">Complemento</label>
                            <input type="text" id="complemento" name="complemento_principal"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_principal->complemento }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bairro" class="control-label">Bairro</label>
                            <input type="text" id="bairro" name="bairro_principal"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_principal->bairro }}">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="cidade_id_principal" class="control-label">Cidade</label>
                            <select name="cidade_id_principal" id="cidade_id_principal" class="form-control pula">
                                <option selected disabled>-------Selecione uma cidade-------</option>
                                @foreach($cidades as $cidade)
                                    <option value="{{ $cidade->id }}" {{ $proprietario->entidade->endereco_principal->cidade_id == $cidade->id ? 'selected' : '' }}>
                                        {{ $cidade->descricao }} - {{ $cidade->estado->descricao }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- ENDEREÇO COBRANÇA-->
                <h4 class="text-center">Endereço cobrança</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cep" class="control-label">CEP</label>
                            <input type="text" id="cep" name="cep_cobranca"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_cobranca->cep }}">
                            <span class="help-block">Apenas os números</span>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="logradouro" class="control-label">Logradouro</label>
                            <input id="logradouro" type="text" class="form-control pula"
                                   name="logradouro_cobranca" value="{{ $proprietario->entidade->endereco_cobranca->logradouro }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="numero" class="control-label">Número</label>
                            <input type="number" min="0" id="numero" name="numero_cobranca"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_cobranca->numero }}">
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="complemento" class="control-label">Complemento</label>
                            <input type="text" id="complemento" name="complemento_cobranca"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_cobranca->complemento }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bairro" class="control-label">Bairro</label>
                            <input type="text" id="bairro" name="bairro_cobranca"
                                   class="form-control pula" value="{{ $proprietario->entidade->endereco_cobranca->bairro }}">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="cidade_id_cobranca" class="control-label">Cidade</label>
                            <select name="cidade_id_cobranca" id="cidade_id_cobranca" class="form-control pula">
                                <option selected disabled>-------Selecione uma cidade-------</option>
                                @foreach($cidades as $cidade)
                                    <option value="{{ $cidade->id }}" {{ $proprietario->entidade->endereco_cobranca->cidade_id == $cidade->id ? 'selected' : '' }}>
                                        {{ $cidade->descricao }} - {{ $cidade->estado->descricao }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Alterar</button>
                            <modal-link tipo="button" css="btn btn-danger" nome="modal-deletar" titulo="Excluir"></modal-link>
                        </div>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
    <modal nome="modal-deletar" tamanho="modal-sm">
        <painel cor="panel-primary" titulo="Tem certeza que deseja deletar este proprietario?">
            <formulario method="DELETE" action="{{ route('entidades.proprietarios.excluir', ['id' => $proprietario->id]) }}"
                        token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger">CONFIRMAR</button>
                    </div>
                </div>
            </formulario>
        </painel>
    </modal>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tipo').focus();
            if ($("select[id=tipo]").val() == 'CNPJ') {
                $(".cnpj").show();
                $(".cpf").hide();
            } else {
                $(".cnpj").hide();
                $(".cpf").show();
            }

            $("select[id=tipo]").on('change', function () {
                if ($("select[id=tipo]").val() == 'CNPJ') {
                    $(".cnpj").show();
                    $(".cpf").hide();
                } else {
                    $(".cnpj").hide();
                    $(".cpf").show();
                }
            });
        });
    </script>
@endsection

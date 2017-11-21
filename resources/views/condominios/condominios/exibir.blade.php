@extends('layouts.app')
@section('titulo', 'Condomínios - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="12">
        <painel titulo="Alterar condomínio" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="PUT" action="{{ route('condominios.condominios.alterar', ['id' => $condominio->id ]) }}"
                        token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nome" class="control-label">Nome</label>
                            <input id="Nome" type="text" class="form-control pula" name="nome"
                                   value="{{ $condominio->nome }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Apelido" class="control-label">Apelido</label>
                            <input id="Apelido" type="text" class="form-control pula" name="apelido"
                                   value="{{ $condominio->apelido }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Telefone" class="control-label">Telefone</label>
                            <input id="Telefone" type="text" class="form-control pula" name="telefone"
                                   value="{{ $condominio->telefone ? $condominio->telefone : '' }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Celular" class="control-label">Celular</label>
                            <input id="Celular" type="text" class="form-control pula" name="celular"
                                   value="{{ $condominio->celular }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Unidades" class="control-label">Unidades</label>
                            <input id="Unidades" type="number" min="0" class="form-control pula" name="unidades"
                                   value="{{ $condominio->unidades }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Multa" class="control-label">Multa (%)</label>
                            <input id="Multa" type="text" class="form-control pula" name="multa" placeholder="150,00"
                                   value="{{ $condominio->multa ? $condominio->multa : '' }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Juros" class="control-label">Juros (%)</label>
                            <input id="Juros" type="text" class="form-control pula" name="juros" placeholder="150,00"
                                   value="{{ $condominio->juros ? $condominio->juros : '' }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="TipoJuros" class="control-label">Tipo de juros</label>
                            <select name="tipo_juros" id="TipoJuros" class="form-control pula">
                                <option disabled selected>----------Selecione----------</option>
                                <option value="AD" {{ $condominio->tipo_juros == 'AD' ? 'selected' : '' }}>Ao
                                    dia
                                </option>
                                <option value="AM" {{ $condominio->tipo_juros == 'AM' ? 'selected' : '' }}>Ao
                                    mês
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="TemGas" class="control-label">Tem gás?</label>
                            <select name="tem_gas" id="TemGas" class="form-control pula">
                                <option disabled selected>----------Selecione----------</option>
                                <option value="1" {{ $condominio->tem_gas == 1 ? 'selected' : '' }}>Sim
                                </option>
                                <option value="0" {{ $condominio->tem_gas == 0 ? 'selected' : '' }}>Não
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ValorGas" class="control-label">Valor do gás</label>
                            <input id="ValorGas" type="text" class="form-control pula" name="valor_gas"
                                   placeholder="150,00"
                                   value="{{ $condominio->valor_gas }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="SindicoCOD" class="control-label">Síndico</label>
                            <select name="sindico_id" id="SindicoCOD" class="form-control pula">
                                <option disabled selected>----------Selecione----------</option>
                                @foreach($sindicos as $sindico)
                                    <option value="{{ $sindico->id }}" {{ $sindico->id == $condominio->sindico_id ? 'selected' : '' }}>
                                        {{ $sindico->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- PARTE FORMULÁRIO ENDEREÇO --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="CEP" class="control-label">CEP</label>
                            <input type="text" id="CEP" name="cep" class="form-control pula"
                                   value="{{ $condominio->endereco->cep }}">
                            <span class="help-block">Apenas os números</span>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="Logradouro" class="control-label">Logradouro</label>
                            <input id="Logradouro" type="text" class="form-control pula" name="logradouro"
                                   value="{{ $condominio->endereco->logradouro }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="Numero" class="control-label">Número</label>
                            <input type="number" min="0" id="Numero" name="numero" class="form-control pula"
                                   value="{{ $condominio->endereco->numero }}">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="Complemento" class="control-label">Complemento</label>
                            <input type="text" id="Complemento" name="complemento" class="form-control pula"
                                   value="{{ $condominio->endereco->complemento ? $condominio->endereco->complemento : '' }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Bairro" class="control-label">Bairro</label>
                            <input type="text" id="Bairro" name="bairro" class="form-control pula"
                                   value="{{ $condominio->endereco->bairro }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="CidadeCOD" class="control-label">Cidade</label>
                            <select name="cidade_id" id="CidadeCOD" class="form-control pula">
                                <option selected disabled>-------Selecione uma cidade-------</option>
                                @foreach($cidades as $cidade)
                                    <option value="{{ $cidade->id }}" {{ $cidade->id == $condominio->endereco->cidade->id ? 'selected' : '' }}>{{ $cidade->descricao }}
                                        - {{ $cidade->estado->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Alterar</button>
                            <modal-link nome="modal-deletar" tipo="button" titulo="Deletar"
                                        css="btn btn-danger"></modal-link>
                            <a class="btn btn-danger"
                               href="{{ route('condominios.condominios.excluir', ['id' => $condominio->id ]) }}">Excluir!</a>
                        </div>
                    </div>
                </div>
            </formulario>
        </painel>

        <painel cor="panel-primary" titulo="Taxas desse condominio"
                url="{{ route('condominios.condominiostaxas.listar', ['idCondominio' => $condominio->id]) }}"
                nomeurl="alterar as taxas desse condominio">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($taxas as $taxa)
                    <tr>
                        <td>{{ $taxa->descricao }}</td>
                        <td>{{ $taxa->valor }}</td>
                        <td>
                            <a href="{{ route('condominios.condominiostaxas.exibir', ['id' => $taxa->id, 'idCondominio' => $condominio->id]) }}"
                               class="btn btn-success">Alterar</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
    <modal nome="modal-deletar" tamanho="modal-sm">
        <painel cor="panel-primary" titulo="Tem certeza que deseja deletar este condomínio?">
            <formulario method="DELETE" action="{{ route('condominios.condominios.excluir', ['id' => $condominio->id]) }}"
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
            if ($("select[id=TemGas]").val() != 1)
                $("#ValorGas").prop("disabled", true);
            else
                $("#ValorGas").prop("disabled", false);
            $("select[id=TemGas]").on('change', function () {
                if ($("select[id=TemGas]").val() != 1)
                    $("#ValorGas").prop("disabled", true);
                else
                    $("#ValorGas").prop("disabled", false);
            });
        });
    </script>
@endsection
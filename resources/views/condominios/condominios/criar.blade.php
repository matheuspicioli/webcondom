@extends('adminlte::page')
@section('title', 'Condominios - criar')
@section('content_header')
    <h1>Listagem de condomínios</h1>
    <div class="pull-rigth">
        <a href="{{ route('condominios.condominios.voltar') }}" class="btn btn-default">
            Voltar
        </a>
    </div>
@stop

@section('content')
    <pagina tamanho="12">
        <painel cor="panel-primary" titulo="Cadastrar condomínio" posicao="text-center">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('condominios.condominios.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario action="{{ route('condominios.condominios.salvar') }}" method="POST" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nome" class="control-label">Nome</label>
                            <input id="Nome" type="text" class="form-control pula" name="nome">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Apelido" class="control-label">Apelido</label>
                            <input id="Apelido" type="text" class="form-control pula" name="apelido">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Telefone" class="control-label">Telefone</label>
                            <input id="Telefone" type="text" class="form-control pula" name="telefone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Celular" class="control-label">Celular</label>
                            <input id="Celular" type="text" class="form-control pula" name="celular">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Unidades" class="control-label">Unidades</label>
                            <input id="Unidades" type="number" min="0" class="form-control pula" name="unidades">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Multa" class="control-label">Multa (R$)</label>
                            <input id="Multa" type="text" class="form-control pula" name="multa" placeholder="150,00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Juros" class="control-label">Juros (R$)</label>
                            <input id="Juros" type="text" class="form-control pula" name="juros"
                                   placeholder="150,00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="TipoJuros" class="control-label">Tipo de juros</label>
                            <select name="tipo_juros" id="TipoJuros" class="form-control pula">
                                <option disabled selected>----------Selecione----------</option>
                                <option value="AD">Ao dia</option>
                                <option value="AM">Ao mês</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="TemGas" class="control-label">Tem gás?</label>
                            <select name="tem_gas" id="TemGas" class="form-control pula">
                                <option disabled selected>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ValorGas" class="control-label">Valor do gás (R$)</label>
                            <input id="ValorGas" type="text" class="form-control pula" name="valor_gas" disabled>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="SindicoCOD" class="control-label pula">Síndico</label>
                            <select name="sindico_id" id="SindicoCOD" class="form-control pula">
                                <option disabled selected>----------Selecione----------</option>
                                @foreach($sindicos as $sindico)
                                    <option value="{{ $sindico->id }}">
                                        {{ $sindico->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <painel titulo="Endereço" cor="panel-info" posicao="text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="CEP" class="control-label">CEP</label>
                                <input type="text" id="CEP" name="cep" class="form-control pula">
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
                                        <option value="{{ $cidade->id }}">{{ $cidade->descricao }}
                                            - {{ $cidade->estado->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </painel>
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
@stop

@section('scripts')

    <script>
        $(document).ready(function () {
            $("#Nome").focus();
            $("select[id=TemGas]").on('change', function () {
                if ($("select[id=TemGas]").val() != 1)
                    $("#ValorGas").prop("disabled", true);
                else
                    $("#ValorGas").prop("disabled", false);
            });
        });
    </script>
@stop
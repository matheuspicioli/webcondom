@extends('layouts.app')
@section('titulo', 'Condomínios - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {{--PAINEL DE FORMULÁRIO--}}
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar condomínio</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><a href="{{ route('condominios.condominios.listar') }}">Voltar</a></h4>
                                <hr>
                            </div>
                        </div>
                        <form method="post" id="Form"
                              action="{{ route('condominios.condominios.alterar', ['id' => $condominio->id ]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
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
                                        <input id="Telefone" type="text" class="form-control pula" name="telefone" data-mask="(00) 0000-0000"
                                               value="{{ $condominio->telefone ? $condominio->telefone : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input id="Celular" type="text" class="form-control pula" name="celular" data-mask="(00) 0 0000-0000"
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
                                        <input id="Multa" type="text" class="form-control pula" name="multa" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true"
                                               value="{{ $condominio->multa ? $condominio->multa : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Juros" class="control-label">Juros (%)</label>
                                        <input id="Juros" type="text" class="form-control pula" name="juros" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true"
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
                                        <input id="ValorGas" type="text" class="form-control pula" name="valor_gas" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true"
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
                                        <input type="text" id="CEP" name="cep" class="form-control pula" value="{{ $condominio->endereco->cep }}" data-mask="00000-000">
                                        <span class="help-block">Apenas os números</span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="Logradouro" class="control-label">Logradouro</label>
                                        <input id="Logradouro" type="text" class="form-control pula" name="logradouro" value="{{ $condominio->endereco->logradouro }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Numero" class="control-label">Número</label>
                                        <input type="number" min="0" id="Numero" name="numero" class="form-control pula" value="{{ $condominio->endereco->numero }}">
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="Complemento" class="control-label">Complemento</label>
                                        <input type="text" id="Complemento" name="complemento" class="form-control pula" value="{{ $condominio->endereco->complemento ? $condominio->endereco->complemento : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Bairro" class="control-label">Bairro</label>
                                        <input type="text" id="Bairro" name="bairro" class="form-control pula" value="{{ $condominio->endereco->bairro }}">
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
                                        <button class="btn btn-danger">
                                            <a style="color: #FFFFFF"
                                               href="{{ route('condominios.condominios.excluir', ['id' => $condominio->id ]) }}">Excluir!</a>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">
                            Taxas desse condomínio - <a href="{{ route('condominios.condominiostaxas.listar', ['idCondominio' => $condominio->id]) }}">alterar as taxas desse condominio</a>
                        </h3>
                    </div>
                    <div class="panel-body">
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
                                    <td><a href="{{ route('condominios.condominiostaxas.exibir', ['id' => $taxa->id ]) }}" class="btn btn-success">Alterar</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/pula-enter.js') }}"></script>
    <script>
        $(document).ready(function(){
            if($("select[id=TemGas]").val() != 1)
                $("#ValorGas").prop("disabled", true);
            else
                $("#ValorGas").prop("disabled", false);
            $("select[id=TemGas]").on('change', function(){
                if($("select[id=TemGas]").val() != 1)
                    $("#ValorGas").prop("disabled", true);
                else
                    $("#ValorGas").prop("disabled", false);
            });
            //--- VALIDAÇÃO DE FORMULARIO
            $("#Form").validate({
                rules: {
                    Nome: {
                        required: true,
                        maxlength: 100
                    },
                    Apelido: {
                        required: true,
                        maxlength: 100
                    },
                    Celular: {
                        required: true,
                        maxlength: 16,
                        minlength: 16
                    },
                    Unidades: {
                        required: true
                    },
                    Multa: {
                        minlength: 4
                    },
                    Juros: {
                        minlength: 4
                    },
                    TipoJuros: {
                        required: true
                    },
                    TemGas: {
                        required: true
                    },
                    ValorGas: {
                        minlength: 4
                    },
                    SindicoCOD: {
                        required: true
                    },
                    Logradouro: {
                        required: true,
                        maxlength: 100,
                        minlength: 5
                    },
                    Numero: {
                        required: true
                    },
                    CEP: {
                        required: true,
                        minlength: 9,
                        maxlength: 9
                    },
                    Bairro: {
                        required: true
                    },
                    CidadeCOD: {
                        required: true
                    }
                },
                messages: {
                    Nome: {
                        required: "Você esqueceu de preencher este campo.",
                        maxlength: "Você ultrapassou o limite de caracteres."
                    },
                    Apelido: {
                        required: "Você esqueceu de preencher este campo.",
                        maxlength: "Você ultrapassou o limite de caracteres."
                    },
                    Celular: {
                        required: "Você esqueceu de preencher este campo.",
                        minlength: "Preencha o campo corretamente.",
                        maxlength: "Preencha o campo corretamente."
                    },
                    Unidades: {
                        required: "Você esqueceu de preencher este campo.",
                    },
                    Multa: {
                        minlength: "Você precisa preencher ao menos 3 digitos."
                    },
                    Juros: {
                        minlength: "Você precisa preencher ao menos 3 digitos."
                    },
                    TipoJuros: {
                        required: "Você esqueceu de preencher este campo."
                    },
                    TemGas: {
                        required: "Você esqueceu de preencher este campo."
                    },
                    ValorGas: {
                        minlength: "Você precisa preencher ao menos 3 digitos."
                    },
                    SindicoCOD: {
                        required: "Você esqueceu de preencher este campo."
                    },
                    Logradouro: {
                        required: "Você esqueceu de preencher este campo.",
                        maxlength: "Você ultrapassou 100 caracteres",
                        minlength: "Precisa preencher ao menos 5 carateres"
                    },
                    Numero: {
                        required: "Você esqueceu de preencher este campo."
                    },
                    CEP: {
                        required: "Você esqueceu de preencher este campo.",
                        minlength: "O CEP deve ter 8 digitos",
                        maxlength: "O CEP deve ter 8 digitos"
                    },
                    Bairro: {
                        required: "Você esqueceu de preencher este campo."
                    },
                    CidadeCOD: {
                        required: "Você esqueceu de preencher este campo."
                    }
                }
            });
        });
        $("#Form").submit(function() {
            $("#CEP").unmask();
            $("#Telefone").unmask();
            $("#Celular").unmask();

            $("#ValorGas").val( $("#ValorGas").val().replace(",", ".") );
            $("#Multa").val( $("#Multa").val().replace(",", ".") );
            $("#Juros").val( $("#Juros").val().replace(",", ".") );
        });
    </script>
@endsection
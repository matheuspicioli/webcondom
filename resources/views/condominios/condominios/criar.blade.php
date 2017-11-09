@extends('layouts.app')
@section('titulo', 'Condominios - Cadastrar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Cadastrar condomínio</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><a href="{{ route('condominios.condominios.listar') }}">Voltar</a></h4>
                                <hr>
                            </div>
                        </div>
                        <form method="post" id="Form" action="{{ route('condominios.condominios.salvar') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label">Nome</label>
                                        <input id="Nome" type="text" class="form-control" name="nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apelido" class="control-label">Apelido</label>
                                        <input id="Apelido" type="text" class="form-control" name="apelido">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Telefone" class="control-label">Telefone</label>
                                        <input id="Telefone" type="text" class="form-control" name="telefone" data-mask="(00) 0000-0000">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input id="Celular" type="text" class="form-control" name="celular" data-mask="(00) 0 0000-0000">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Unidades" class="control-label">Unidades</label>
                                        <input id="Unidades" type="number" min="0" class="form-control" name="unidades">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Multa" class="control-label">Multa (R$)</label>
                                        <input id="Multa" type="text" class="form-control" name="multa" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Juros" class="control-label">Juros (R$)</label>
                                        <input id="Juros" type="text" class="form-control" name="juros" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="TipoJuros" class="control-label">Tipo de juros</label>
                                        <select name="tipo_juros" id="TipoJuros" class="form-control">
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
                                        <select name="tem_gas" id="TemGas" class="form-control">
                                            <option disabled selected>Selecione</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ValorGas" class="control-label">Valor do gás (R$)</label>
                                        <input id="ValorGas" type="text" class="form-control" name="valor_gas" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true" disabled>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="SindicoCOD" class="control-label">Síndico</label>
                                        <select name="sindico_id" id="SindicoCOD" class="form-control">
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

                            {{-- PARTE FORMULÁRIO ENDEREÇO --}}

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="Logradouro" class="control-label">Logradouro</label>
                                        <input id="Logradouro" type="text" class="form-control" name="logradouro">
                                    </div>
                                </div>

                                <div class="col-md-2"> 
                                    <div class="form-group">
                                        <label for="Numero" class="control-label">Número</label>
                                        <input type="number" min="0" id="Numero" name="numero" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="Complemento" class="control-label">Complemento</label>
                                        <input type="text" id="Complemento" name="complemento" class="form-control">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="CEP" class="control-label">CEP</label>
                                        <input type="text" id="CEP" name="cep" class="form-control" data-mask="00000-000">
                                        <span class="help-block">Apenas os números</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Bairro" class="control-label">Bairro</label>
                                        <input type="text" id="Bairro" name="bairro" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="CidadeCOD" class="control-label">Cidade:</label>
                                        <select name="cidade_id" id="CidadeCOD" class="form-control">
                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                            @foreach($cidades as $cidade)
                                                <option value="{{ $cidade->id }}">{{ $cidade->descricao }}
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
                                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function(){
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
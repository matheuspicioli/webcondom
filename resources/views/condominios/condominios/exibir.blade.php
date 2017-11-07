@extends('layouts.app')
@section('titulo', 'Condomínios - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">
                            Taxas desse condomínio - <a href="{{ route('condominios.condominiostaxas.listar', ['idCondominio' => $condominio->CondominioID]) }}">alterar as taxas desse condominio</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taxas as $taxa)
                                <tr>
                                    <td>{{ $taxa->Descricao }}</td>
                                    <td>{{ $taxa->Valor }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

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
                              action="{{ route('condominios.condominios.alterar', ['id' => $condominio->CondominioID ]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label">Nome</label>
                                        <input id="Nome" type="text" class="form-control" name="Nome"
                                               value="{{ $condominio->Nome }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apelido" class="control-label">Apelido</label>
                                        <input id="Apelido" type="text" class="form-control" name="Apelido"
                                               value="{{ $condominio->Apelido }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Telefone" class="control-label">Telefone</label>
                                        <input id="Telefone" type="text" class="form-control" name="Telefone" data-mask="(00) 0000-0000"
                                               value="{{ $condominio->Telefone ? $condominio->Telefone : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input id="Celular" type="text" class="form-control" name="Celular" data-mask="(00) 0 0000-0000"
                                               value="{{ $condominio->Celular }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Unidades" class="control-label">Unidades</label>
                                        <input id="Unidades" type="number" min="0" class="form-control" name="Unidades"
                                               value="{{ $condominio->Unidades }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Multa" class="control-label">Multa (%)</label>
                                        <input id="Multa" type="text" class="form-control" name="Multa" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true"
                                               value="{{ $condominio->Multa ? $condominio->Multa : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Juros" class="control-label">Juros (%)</label>
                                        <input id="Juros" type="text" class="form-control" name="Juros" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true"
                                               value="{{ $condominio->Juros ? $condominio->Juros : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TipoJuros" class="control-label">Tipo de juros</label>
                                        <select name="TipoJuros" id="TipoJuros" class="form-control">
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="AD" {{ $condominio->TipoJuros == 'AD' ? 'selected' : '' }}>Ao
                                                dia
                                            </option>
                                            <option value="AM" {{ $condominio->TipoJuros == 'AM' ? 'selected' : '' }}>Ao
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
                                        <select name="TemGas" id="TemGas" class="form-control">
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="1" {{ $condominio->TemGas == 1 ? 'selected' : '' }}>Sim
                                            </option>
                                            <option value="0" {{ $condominio->TemGas == 0 ? 'selected' : '' }}>Não
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ValorGas" class="control-label">Valor do gás</label>
                                        <input id="ValorGas" type="text" class="form-control" name="ValorGas" placeholder="150,00" data-mask="#.##0,00" data-mask-reverse="true"
                                               value="{{ $condominio->ValorGas }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="SindicoCOD" class="control-label">Síndico</label>
                                        <select name="SindicoCOD" id="SindicoCOD" class="form-control">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($sindicos as $sindico)
                                                <option value="{{ $sindico->SindicoID }}" {{ $sindico->SindicoID == $condominio->SindicoCOD ? 'selected' : '' }}>
                                                    {{ $sindico->Nome }}
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
                                        <input id="Logradouro" type="text" class="form-control" name="Logradouro" value="{{ $condominio->Endereco->Logradouro }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Numero" class="control-label">Número</label>
                                        <input type="number" min="0" id="Numero" name="Numero" class="form-control" value="{{ $condominio->Endereco->Numero }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="Complemento" class="control-label">Complemento</label>
                                        <input type="text" id="Complemento" name="Complemento" class="form-control" value="{{ $condominio->Endereco->Complemento ? $condominio->Endereco->Complemento : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="CEP" class="control-label">CEP</label>
                                        <input type="text" id="CEP" name="CEP" class="form-control" value="{{ $condominio->Endereco->CEP }}" data-mask="00000-000">
                                        <span class="help-block">Apenas os números</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Bairro" class="control-label">Bairro</label>
                                        <input type="text" id="Bairro" name="Bairro" class="form-control" value="{{ $condominio->Endereco->Bairro }}">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="CidadeCOD" class="control-label">Cidade:</label>
                                        <select name="CidadeCOD" id="CidadeCOD" class="form-control">
                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                            @foreach($cidades as $cidade)
                                                <option value="{{ $cidade->CidadeID }}" {{ $cidade->CidadeID == $condominio->Endereco->Cidade->CidadeID ? 'selected' : '' }}>{{ $cidade->Descricao }}
                                                    - {{ $cidade->Estado->Descricao }}</option>
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
                                               href="{{ route('condominios.condominios.excluir', ['id' => $condominio->CondominioID ]) }}">Excluir!</a>
                                        </button>
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
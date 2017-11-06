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
                        <form method="post"
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
                                        <input id="Telefone" type="text" class="form-control" name="Telefone"
                                               value="{{ $condominio->Telefone ? $condominio->Telefone : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input id="Celular" type="text" class="form-control" name="Celular"
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
                                        <input id="Multa" type="text" class="form-control" name="Multa"
                                               value="{{ $condominio->Multa ? $condominio->Multa : '' }}">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Juros" class="control-label">Juros (%)</label>
                                        <input id="Juros" type="text" class="form-control" name="Juros"
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
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ValorGas" class="control-label">Valor do gás</label>
                                        <input id="ValorGas" type="text" class="form-control" name="ValorGas"
                                               value="{{ $condominio->ValorGas }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
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
                                        <input type="number" id="CEP" name="CEP" class="form-control" value="{{ $condominio->Endereco->CEP }}">
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
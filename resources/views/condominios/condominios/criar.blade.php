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
                        <form method="post" action="{{ route('condominios.condominios.salvar') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label">Nome</label>
                                        <input id="Nome" type="text" class="form-control" name="Nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apelido" class="control-label">Apelido</label>
                                        <input id="Apelido" type="text" class="form-control" name="Apelido">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Telefone" class="control-label">Telefone</label>
                                        <input id="Telefone" type="text" class="form-control" name="Telefone">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input id="Celular" type="text" class="form-control" name="Celular">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Unidades" class="control-label">Unidades</label>
                                        <input id="Unidades" type="number" min="0" class="form-control" name="Unidades">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Multa" class="control-label">Multa</label>
                                        <input id="Multa" type="text" class="form-control" name="Multa">
                                        <span class="helper-block">Este campo é opcional</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Juros" class="control-label">Juros</label>
                                        <input id="Juros" type="text" class="form-control" name="Juros">
                                        <span class="helper-block">Este campo é opcional</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TipoJuros" class="control-label">Tipo de juros</label>
                                        <select name="TipoJuros" id="TipoJuros" class="form-control">
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="AD">Ao dia</option>
                                            <option value="AM">Ao mês</option>
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
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ValorGas" class="control-label">Valor do gás</label>
                                        <input id="ValorGas" type="text" class="form-control" name="ValorGas">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="EnderecoCOD" class="control-label">Endereço:</label>
                                        <select name="EnderecoCOD" id="EnderecoCOD" class="form-control">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($enderecos as $endereco)
                                                <option value="{{ $endereco->EnderecoID }}">
                                                    {{ $endereco->Logradouro }}, {{ $endereco->Numero }}
                                                    , {{ $endereco->Bairro }} - {{ $endereco->Cidade->Descricao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="SindicoCOD" class="control-label">Síndico</label>
                                        <select name="SindicoCOD" id="SindicoCOD" class="form-control">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($sindicos as $sindico)
                                                <option value="{{ $sindico->SindicoID }}">
                                                    {{ $sindico->Nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr />
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
    </div>
    </div>
@endsection
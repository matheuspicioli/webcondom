@extends('layouts.app')
@section('titulo', 'Endereços - Criar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Cadastrar endereço</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('enderecos.enderecos.listar') }}">Voltar</a></h4>
                                <hr>
                                <form method="post" action="{{ route('enderecos.enderecos.salvar') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="Logradouro" class="control-label">Logradouro</label>
                                        <input id="Logradouro" type="text" class="form-control" name="logradouro">
                                    </div>

                                    <div class="form-group">
                                        <label for="Numero" class="control-label">Número</label>
                                        <input type="number" min="0" id="Numero" name="numero" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="CEP" class="control-label">CEP</label>
                                        <input type="number" id="CEP" name="cep" class="form-control">
                                        <span class="help-block">Apenas os números</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Complemento" class="control-label">Complemento</label>
                                        <input type="text" id="Complemento" name="complemento" class="form-control">
                                        <span class="help-block">Este campo é opcional</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Bairro" class="control-label">Bairro</label>
                                        <input type="text" id="Bairro" name="bairro" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="CidadeCOD" class="control-label">Cidade:</label>
                                        <select name="cidade_id" id="CidadeCOD" class="form-control">
                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                            @foreach($cidades as $cidade)
                                                <option value="{{ $cidade->id }}">{{ $cidade->descricao }} - {{ $cidade->estado->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Cadastrar</button>
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

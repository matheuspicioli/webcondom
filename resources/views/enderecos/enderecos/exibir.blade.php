@extends('layouts.app')
@section('titulo', 'Endereços - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar endereco</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('enderecos.enderecos.listar') }}">Voltar</a></h4>
                                <hr>
                                    <form method="post" action="{{ route('enderecos.enderecos.alterar', ['id' => $endereco->id ]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                            <label for="Logradouro" class="control-label">Logradouro</label>
                                            <input id="Logradouro" type="text" class="form-control" name="logradouro" value="{{ $endereco->logradouro }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="Numero" class="control-label">Número</label>
                                            <input type="number" min="0" id="Numero" name="numero" class="form-control" value="{{ $endereco->numero }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="CEP" class="control-label">CEP</label>
                                            <span class="help-block">Apenas os números</span>
                                            <input type="number" id="CEP" name="cep" class="form-control" value="{{ $endereco->cep }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="Numero" class="control-label">Complemento</label>
                                            <input type="text" id="Complemento" name="complemento" class="form-control" value="{{ $endereco->complemento ? $endereco->complemento : '' }}">
                                            <span class="help-block">Este campo é opcional</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="Bairro" class="control-label">Bairro</label>
                                            <input type="text" id="Bairro" name="bairro" class="form-control" value="{{ $endereco->bairro }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="CidadeCOD" class="control-label">Cidade:</label>
                                            <select name="cidade_id" id="CidadeCOD" class="form-control">
                                                @foreach($cidades as $cidade)
                                                    <option {{ $cidade->id == $endereco->cidade_id ? 'selected' : '' }}
                                                            value="{{ $cidade->id }}">{{ $cidade->descricao }} - {{ $cidade->estado->sigla }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                            <button class="btn btn-danger">
                                                <a style="color: #FFFFFF"
                                                   href="{{ route('enderecos.enderecos.excluir', ['id' => $endereco->id ]) }}">Excluir!</a>
                                            </button>
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

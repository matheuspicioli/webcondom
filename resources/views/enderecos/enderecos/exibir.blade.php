@extends('layouts.app')
@section('titulo', 'Endereços - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Alterar endereço">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="PUT" action="{{ route('enderecos.enderecos.alterar', ['id' => $endereco->id ]) }}"
                        token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Logradouro" class="control-label">Logradouro</label>
                    <input id="Logradouro" type="text" class="form-control" name="logradouro"
                           value="{{ $endereco->logradouro }}">
                </div>

                <div class="form-group">
                    <label for="Numero" class="control-label">Número</label>
                    <input type="number" min="0" id="Numero" name="numero" class="form-control"
                           value="{{ $endereco->numero }}">
                </div>

                <div class="form-group">
                    <label for="CEP" class="control-label">CEP</label>
                    <input type="number" id="CEP" name="cep" class="form-control" value="{{ $endereco->cep }}">
                    <span class="help-block">Apenas os números</span>
                </div>

                <div class="form-group">
                    <label for="Numero" class="control-label">Complemento</label>
                    <input type="text" id="Complemento" name="complemento" class="form-control"
                           value="{{ $endereco->complemento ? $endereco->complemento : '' }}">
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
                                    value="{{ $cidade->id }}">{{ $cidade->descricao }}
                                - {{ $cidade->estado->sigla }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                    <a class="btn btn-danger"
                       href="{{ route('enderecos.enderecos.excluir', ['id' => $endereco->id ]) }}">Excluir!</a>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection

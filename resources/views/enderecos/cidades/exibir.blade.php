@extends('layouts.app')
@section('titulo', 'Cidades - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Alterar cidade">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('enderecos.cidades.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="PUT" action="{{ route('enderecos.cidades.alterar', ['id' => $cidade->id]) }}"
                        token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="EstadoCOD" class="control-label">Estado</label>
                            <select name="estado_id" id="EstadoCOD" class="form-control">
                                @foreach($estados as $estado)
                                    <option {{ $estado->id == $cidade->estado_id ? 'selected' : '' }} value="{{ $estado->id }}">{{ $estado->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao"
                                   value="{{ $cidade->descricao }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="CodigoIBGE" class="control-label">Codigo IBGE</label>
                            <input type="text" id="CodigoIBGE" name="codigo_ibge" class="form-control"
                                   value="{{ $cidade->codigo_ibge ? $cidade->codigo_ibge : '' }}">
                            <span class="help-block">Este campo é opcional</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Alterar</button>
                            <a href="{{ route('enderecos.cidades.excluir', ['id' => $cidade->id]) }}"
                               class="btn btn-danger">Excluir</a>
                        </div>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection
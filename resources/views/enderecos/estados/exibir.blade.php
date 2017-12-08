@extends('layouts.app')
@section('titulo', 'Estados - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="12">
        <painel titulo="Alterar estado" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="PUT" action="{{ route('enderecos.estados.alterar', ['id' => $estado->id ]) }}"
                        token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Descricao" class="control-label">Descrição</label>
                    <input id="Descricao" type="text" class="form-control pula" name="descricao"
                           value="{{ $estado->descricao}}">
                </div>

                <div class="form-group">
                    <label for="Sigla" class="control-label">Sigla</label>
                    <input type="text" id="Sigla" name="sigla" class="form-control pula" value="{{ $estado->sigla }}">
                </div>

                <div class="form-group">
                    <label for="CodigoIBGE" class="control-label">Código IBGE</label>
                    <input type="text" id="CodigoIBGE" name="codigo_ibge" class="form-control pula"
                           value="{{ $estado->codigo_ibge }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                    <a class="btn btn-danger"
                       href="{{ route('enderecos.estados.excluir', ['id' => $estado->id ]) }}">Excluir!</a>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection

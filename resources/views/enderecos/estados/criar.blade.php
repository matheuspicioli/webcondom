@extends('layouts.app')
@section('titulo', 'Estados - Criar')
@section('conteudo')
    <pagina tamanho="10">
        <painel titulo="Cadastrar estado" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="POST" action="{{ route('enderecos.estados.salvar') }}" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Descricao" class="control-label">Descrição</label>
                    <input id="Descricao" type="text" class="form-control" name="descricao">
                </div>

                <div class="form-group">
                    <label for="Sigla" class="control-label">Sigla</label>
                    <input type="text" id="Sigla" name="sigla" class="form-control">
                </div>

                <div class="form-group">
                    <label for="CodigoIBGE" class="control-label">Código IBGE</label>
                    <input type="text" id="CodigoIBGE" name="codigo_ibge" class="form-control">
                    <span class="help-block">Este campo é opcional</span>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection

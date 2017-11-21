@extends('layouts.app')
@section('titulo', 'Departamentos - Criar')
@section('conteudo')
    <pagina tamanho="8">
        <painel cor="panel-primary" titulo="Cadastrar Departamento">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario action="{{ route('diversos.departamento.salvar') }}" method="POST" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Descricao" class="control-label">Descrição</label>
                    <input id="Descricao" type="text" class="form-control" name="descricao">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection

@extends('layouts.app')
@section('titulo', 'Cidades - Cadastrar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Cadastrar cidade">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="POST" action="{{ route('enderecos.cidades.salvar') }}" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="EstadoCOD" class="control-label">Estado</label>
                    <select name="estado_id" id="EstadoCOD" class="form-control">
                        <option selected disabled>-------Selecione um estado-------</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->descricao }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="Descricao" class="control-label">Descrição</label>
                    <input id="Descricao" type="text" class="form-control" name="descricao">
                </div>

                <div class="form-group">
                    <label for="CodigoIBGE" class="control-label">Codigo IBGE</label>
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
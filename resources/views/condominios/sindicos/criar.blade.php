@extends('layouts.app')
@section('titulo', 'Sindicos - Cadastrar')
@section('conteudo')
    <pagina tamanho="10">
        <painel titulo="Cadastrar sindico" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario action="{{ route('condominios.sindicos.salvar') }}" method="POST" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Nome" class="control-label">Nome</label>
                    <input id="Nome" type="text" class="form-control" name="nome">
                </div>

                <div class="form-group">
                    <label for="Telefone" class="control-label">Telefone</label>
                    <input type="text" id="Telefone" name="telefone" class="form-control">
                    <span class="help-block">Este campo é opcional</span>
                </div>

                <div class="form-group">
                    <label for="Celular" class="control-label">Celular</label>
                    <input type="text" id="Celular" name="celular" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection
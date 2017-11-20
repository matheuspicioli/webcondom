@extends('layouts.app')
@section('titulo', 'Sindicos - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="12">
        <painel cor="panel-primary" titulo="Alterar sindico">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="PUT" action="{{ route('condominios.sindicos.alterar', ['id' => $sindico->id ]) }}"
                        token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Nome" class="control-label">Nome</label>
                    <input id="Nome" type="text" class="form-control" name="nome"
                           value="{{ $sindico->nome }}">
                </div>

                <div class="form-group">
                    <label for="Telefone" class="control-label">Telefone</label>
                    <input type="text" id="Telefone" name="telefone" class="form-control"
                           value="{{ $sindico->telefone ? $sindico->telefone : '' }}">
                    <span class="helper-block">Este campo é opcional</span>
                </div>

                <div class="form-group">
                    <label for="Celular" class="control-label">Celular</label>
                    <input type="text" id="Celular" name="celular" class="form-control"
                           value="{{ $sindico->celular }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Alterar</button>
                    <a class="btn btn-danger"
                       href="{{ route('condominios.sindicos.excluir', ['id' => $sindico->id]) }}">
                        Excluir</a>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection
@extends('layouts.app')
@section('titulo', 'Regime de Casamento - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Alterar Regimes de Casamento">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario action="{{ route('diversos.regimeCasamento.alterar', ['id' => $regimeCasamento->id ]) }}"
                        method="PUT" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="Descricao"
                                   value="{{ $regimeCasamento->Descricao}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <a class="btn btn-danger"
                           href="{{ route('diversos.regimeCasamento.excluir', ['id' => $regimeCasamento->id ]) }}">Excluir!</a>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection

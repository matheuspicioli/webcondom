@extends('layouts.app')
@section('titulo', 'Regime de Casamento - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Alterar Regimes de Casamento">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.regimeCasamento.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario action="{{ route('diversos.regimeCasamento.alterar', ['id' => $regimeCasamento->id ]) }}"
                        method="PUT" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao"
                                   value="{{ $regimeCasamento->descricao }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <modal-link nome="modal-deletar" titulo="Deletar" tipo="button" css="btn btn-danger"></modal-link>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
    <modal nome="modal-deletar" tamanho="modal-sm">
        <painel cor="panel-primary" titulo="Tem certeza que deseja deletar este departamento?">
            <formulario method="DELETE" action="{{ route('diversos.regimeCasamento.excluir', ['id' => $regimeCasamento->id]) }}"
                        token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger">CONFIRMAR</button>
                    </div>
                </div>
            </formulario>
        </painel>
    </modal>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#Descricao').focus();
        });
    </script>
@endsection
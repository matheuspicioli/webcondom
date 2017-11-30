@extends('layouts.app')
@section('titulo', 'Tipos imóveis - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel titulo="Alterar tipo imóvel" cor="panel-primary">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.tiposimoveis.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <formulario method="PUT" action="{{ route('diversos.tiposimoveis.alterar', ['id' => $tipoImovel->id ]) }}"
                                token="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Descricao" class="control-label">Descrição</label>
                                    <input id="Descricao" type="text" class="form-control" name="descricao"
                                           value="{{ $tipoImovel->descricao }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Salvar</button>
                                <modal-link tipo="button" css="btn btn-danger" nome="modal-deletar" titulo="Excluir"></modal-link>
                            </div>
                        </div>
                    </formulario>
                </div>
            </div>
        </painel>
    </pagina>
    <modal nome="modal-deletar" tamanho="modal-sm">
        <painel cor="panel-primary" titulo="Tem certeza que deseja deletar este tipo de imóvel??">
            <formulario method="DELETE" action="{{ route('diversos.tiposimoveis.excluir', ['id' => $tipoImovel->id]) }}"
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
@extends('layouts.app')
@section('titulo', 'Taxa de condomínios - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="12">
        <painel cor="panel-primary" titulo="Alterar taxa de condomínio">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario action="{{ route('condominios.condominiostaxas.alterar', ['id' => $taxa->id, 'idCondominio' => $idCondominio])  }}" method="PUT" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao"
                                   value="{{ $taxa->descricao }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Valor" class="control-label">Valor</label>
                            <input id="Valor" type="text" class="form-control" name="valor"
                                   value="{{ $taxa->valor }}">
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Alterar</button>
                            <modal-link nome="modal-deletar" titulo="Excluir" tipo="button" css="btn btn-danger"></modal-link>
                            <modal nome="modal-deletar" tamanho="modal-sm">
                                <painel cor="panel-primary" titulo="Tem certeza que deseja deletar este condomínio?">
                                    <formulario method="DELETE" action="{{ route('condominios.condominiostaxas.excluir', ['id' => $taxa->id, 'idCondominio' => $idCondominio]) }}"
                                                token="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-danger">CONFIRMAR</button>
                                            </div>
                                        </div>
                                    </formulario>
                                </painel>
                            </modal>
                        </div>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection
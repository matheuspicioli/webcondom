@extends('layouts.app')
@section('titulo', 'Categorias - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel titulo="Alterar categoria" cor="panel-primary">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.categorias.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <formulario method="PUT" action="{{ route('diversos.categorias.alterar', ['id' => $categoria->id ]) }}"
                                token="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Descricao" class="control-label">Descrição</label>
                                    <input id="Descricao" type="text" class="form-control" name="descricao"
                                           value="{{ $categoria->descricao }}">
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
        <painel cor="panel-primary" titulo="Tem certeza que deseja deletar esta categoria?">
            <formulario method="DELETE" action="{{ route('diversos.categorias.excluir', ['id' => $categoria->id]) }}"
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
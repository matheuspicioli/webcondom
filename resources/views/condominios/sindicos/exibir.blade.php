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
                    <input id="Nome" type="text" class="form-control pula" name="nome"
                           value="{{ $sindico->nome }}">
                </div>

                <div class="form-group">
                    <label for="Telefone" class="control-label">Telefone</label>
                    <input type="text" id="Telefone" name="telefone" class="form-control pula"
                           value="{{ $sindico->telefone ? $sindico->telefone : '' }}">
                </div>

                <div class="form-group">
                    <label for="Celular" class="control-label">Celular</label>
                    <input type="text" id="Celular" name="celular" class="form-control pula"
                           value="{{ $sindico->celular }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Alterar</button>
                    <modal-link nome="modal-deletar" tipo="button" titulo="Deletar" css="btn btn-danger"></modal-link>
                </div>
            </formulario>
        </painel>
    </pagina>
    <modal nome="modal-deletar" tamanho="modal-sm">
        <painel cor="panel-primary" titulo="Tem certeza que deseja deletar este sindico?">
            <formulario method="DELETE" action="{{ route('condominios.sindicos.excluir', ['id' => $sindico->id]) }}"
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
            $('#Nome').focus();
        });
    </script>
@endsection
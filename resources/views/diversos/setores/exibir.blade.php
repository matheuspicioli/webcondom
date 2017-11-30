@extends('layouts.app')
@section('titulo', 'Setores - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="8">
        <painel titulo="Alterar setor" cor="panel-primary">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.setores.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="PUT" action="{{ route('diversos.setores.alterar', ['id' => $setor->id ]) }}"
                        token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao"
                                   value="{{ $setor->descricao }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <a class="btn btn-danger"
                           href="{{ route('diversos.setores.excluir', ['id' => $setor->id ]) }}">Excluir!</a>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#Descricao').focus();
        });
    </script>
@endsection
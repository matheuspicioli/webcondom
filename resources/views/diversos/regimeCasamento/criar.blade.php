@extends('layouts.app')
@section('titulo', 'Regime de Casamento - Criar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Cadastrar Regime de Casamento">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.regimeCasamento.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario action="{{ route('diversos.regimeCasamento.salvar') }}" method="POST" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Descricao" class="control-label">Descrição</label>
                    <input id="Descricao" type="text" class="form-control" name="descricao">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
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
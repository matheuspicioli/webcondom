@extends('layouts.app')
@section('titulo', 'Setores - Criar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Cadastrar setor">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.setores.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <formulario action="{{ route('diversos.setores.salvar') }}" method="POST" token="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
                    </formulario>
                </div>
            </div>
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

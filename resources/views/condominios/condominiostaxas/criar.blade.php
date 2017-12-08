@extends('layouts.app')
@section('titulo', 'Taxa de condomínios - Cadastrar')
@section('conteudo')
    <pagina tamanho="12">
        <painel cor="panel-primary" titulo="Cadastrar taxa de condomínio">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario action="{{ route('condominios.condominiostaxas.salvar', ['idCondominio' => $idCondominio]) }}" method="POST" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control pula" name="descricao">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Valor" class="control-label">Valor</label>
                            <input id="Valor" type="text" class="form-control pula" name="valor">
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
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
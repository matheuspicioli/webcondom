@extends('layouts.app')
@section('titulo', 'Estado Civil - Criar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Cadastrar Estado Civil">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="POST" action="{{ route('diversos.estadoCivil.salvar') }}" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="Descricao">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ExigeConjuge" class="control-label">Exige Conjuge?</label>
                            <select name="ExigeConjuge" id="ExigeConjuge" class="form-control pula">
                                <option disabled selected>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>
                </div>
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

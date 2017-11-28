@extends('layouts.app')
@section('titulo', 'Estado Civil - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Alterar Estado Civil">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.estadoCivil.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="PUT" action="{{ route('diversos.estadoCivil.alterar', ['id' => $estadoCivil->id ]) }}"
                        token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao"
                                   value="{{ $estadoCivil->descricao}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ExigeConjuge" class="control-label">Exige Conjuge?</label>
                            <select name="exige_conjuge" id="ExigeConjuge" class="form-control pula">
                                <option disabled selected>----------Selecione----------</option>
                                <option value="1" {{ $estadoCivil->exige_conjuge == 1 ? 'selected' : '' }}>Sim
                                </option>
                                <option value="0" {{ $estadoCivil->exige_conjuge == 0 ? 'selected' : '' }}>Não
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <a class="btn btn-danger"
                           href="{{ route('diversos.estadoCivil.excluir', ['id' => $estadoCivil->id ]) }}">Excluir!</a>
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
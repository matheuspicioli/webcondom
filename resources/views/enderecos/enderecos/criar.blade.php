@extends('layouts.app')
@section('titulo', 'Endereços - Criar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Cadastrar endereço">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('enderecos.enderecos.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="POST" action="{{ route('enderecos.enderecos.criar') }}" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Logradouro" class="control-label">Logradouro</label>
                    <input id="Logradouro" type="text" class="form-control pula" name="logradouro">
                </div>
                <div class="form-group">
                    <label for="Numero" class="control-label">Número</label>
                    <input type="text"  id="Numero" name="numero" class="form-control pula">
                </div>
                <div class="form-group">
                    <label for="CEP" class="control-label">CEP</label>
                    <input type="number" id="CEP" name="cep" class="form-control pula">
                </div>
                <div class="form-group">
                    <label for="Complemento" class="control-label">Complemento</label>
                    <input type="text" id="Complemento" name="complemento" class="form-control pula">
                </div>
                <div class="form-group">
                    <label for="Bairro" class="control-label">Bairro</label>
                    <input type="text" id="Bairro" name="bairro" class="form-control pula">
                </div>
                <div class="form-group">
                    <label for="CidadeCOD" class="control-label">Cidade:</label>
                    <select name="cidade_id" id="CidadeCOD" class="form-control pula">
                        <option selected disabled>-------Selecione uma cidade-------</option>
                        @foreach($cidades as $cidade)
                            <option value="{{ $cidade->id }}">{{ $cidade->descricao }} - {{ $cidade->estado->descricao }}</option>
                        @endforeach
                    </select>
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
            $('#Logradouro').focus();
        });
    </script>
@endsection
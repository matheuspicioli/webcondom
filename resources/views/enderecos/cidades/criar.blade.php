@extends('layouts.app')
@section('titulo', 'Cidades - Cadastrar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Cadastrar cidade">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('enderecos.cidades.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="POST" action="{{ route('enderecos.cidades.salvar') }}" token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="EstadoCOD" class="control-label">Estado</label>
                            <select name="estado_id" id="EstadoCOD" class="form-control pula">
                                <option selected disabled>-------Selecione um estado-------</option>
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control pula" name="descricao">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="CodigoIBGE" class="control-label">Codigo IBGE</label>
                            <input type="text" id="CodigoIBGE" name="codigo_ibge" class="form-control pula">
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#EstadoCOD').focus();
        });
    </script>
@endsection
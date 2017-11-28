@extends('layouts.app')
@section('titulo', 'Departamentos - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="8">
        <painel titulo="Alterar Departamentos" cor="panel-primary">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('diversos.departamento.listar') }}" class="btn btn-default">Voltar</a>
                    <hr>
                </div>
                <div class="col-md-11">
                    <migalha v-bind:lista="{{ $migalhas }}"></migalha>
                </div>
            </div>
            <formulario method="PUT" action="{{ route('diversos.departamento.alterar', ['id' => $departamento->id ]) }}"
                        token="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Descricao" class="control-label">Descrição</label>
                            <input id="Descricao" type="text" class="form-control" name="descricao"
                                   value="{{ $departamento->descricao }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <a class="btn btn-danger"
                           href="{{ route('diversos.departamento.excluir', ['id' => $departamento->id ]) }}">Excluir!</a>
                    </div>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection

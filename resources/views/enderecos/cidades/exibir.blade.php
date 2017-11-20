@extends('layouts.app')
@section('titulo', 'Cidades - Exibir/Alterar')
@section('conteudo')
    <pagina tamanho="10">
        <painel cor="panel-primary" titulo="Alterar cidade">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <formulario method="PUST" action="{{ route('enderecos.cidades.alterar', ['id' => $cidade->id]) }}" token="{{ csrf_token() }}">
                @if($cidade)
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="post" action="{{ route('enderecos.cidades.alterar', ['id' => $cidade->id ]) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="EstadoCOD" class="control-label">Estado</label>
                                    <select name="estado_id" id="EstadoCOD" class="form-control">
                                        @foreach($estados as $estado)
                                            <option {{ $estado->id == $cidade->estado_id ? 'selected' : '' }} value="{{ $estado->id }}">{{ $estado->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Descricao" class="control-label">Descrição</label>
                                    <input id="Descricao" type="text" class="form-control" name="descricao" value="{{ $cidade->descricao }}">
                                </div>

                                <div class="form-group">
                                    <label for="CodigoIBGE" class="control-label">Codigo IBGE</label>
                                    <input type="text" id="CodigoIBGE" name="codigo_ibge" class="form-control" value="{{ $cidade->codigo_ibge ? $cidade->codigo_ibge : '' }}">
                                    <span class="help-block">Este campo é opcional</span>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Alterar</button>
                                    <a href="{{ route('enderecos.cidades.excluir', ['id' => $cidade->id]) }}" class="btn btn-danger">Excluir</a>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <h1 class="center-text">Nenhuma cidade encontrada com esse ID</h1>
                @endif
            </formulario>
        </painel>
    </pagina>
@endsection
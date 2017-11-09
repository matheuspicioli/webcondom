@extends('layouts.app')
@section('titulo', 'Cidades - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar cidade</h3>
                    </div>

                    <div class="panel-body">
                        @if($cidade)
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h4><a href="{{ route('enderecos.cidades.listar') }}">Voltar</a></h4>
                                    <hr>
                                    <form method="post" action="{{ route('enderecos.cidades.alterar', ['id' => $cidade->id ]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
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
                                            <label for="EstadoCOD" class="control-label">Estado</label>
                                            <select name="estado_id" id="EstadoCOD" class="form-control">
                                                @foreach($estados as $estado)
                                                    <option {{ $estado->id == $cidade->estado_id ? 'selected' : '' }} value="{{ $estado->id }}">{{ $estado->descricao }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Alterar</button>
                                            <button class="btn btn-danger"><a href="{{ route('enderecos.cidades.excluir', ['id' => $cidade->id]) }}" style="color: #FFFFFF">Excluir</a></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <h1 class="center-text">Nenhuma cidade encontrada com esse ID</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
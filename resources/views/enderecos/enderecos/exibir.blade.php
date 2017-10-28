@extends('layouts.app')
@section('titulo', 'Endereços - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar endereco</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('enderecos.enderecos.listar') }}">Voltar</a></h4>
                                <hr>
                                    <form method="post" action="{{ route('enderecos.enderecos.alterar', ['id' => $endereco->EnderecoID ]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                            <label for="Rua" class="control-label">Rua</label>
                                            <input id="Rua" type="text" class="form-control" name="Rua" value="{{ $endereco->Rua }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="Numero" class="control-label">Número</label>
                                            <input type="number" min="0" id="Numero" name="Numero" class="form-control" value="{{ $endereco->Numero }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="CEP" class="control-label">CEP</label>
                                            <span class="help-block">Apenas os números</span>
                                            <input type="number" id="CEP" name="CEP" class="form-control" value="{{ $endereco->CEP }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="Numero" class="control-label">Complemento</label>
                                            <input type="text" id="Complemento" name="Complemento" class="form-control" value="{{ $endereco->Complemento ? $endereco->Complemento : '' }}">
                                        </div>

                                        <div class="form-group">
                                            <select name="CidadeCOD" id="CidadeCOD" class="form-control">
                                                @foreach($cidades as $cidade)
                                                    <option {{ $cidade->CidadeID == $endereco->CidadeCOD ? 'selected' : '' }}
                                                            value="{{ $cidade->CidadeID }}">{{ $cidade->Descricao }} {{ $cidade->Estado->Descricao }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                            <button class="btn btn-danger">
                                                <a style="color: #FFFFFF"
                                                   href="{{ route('enderecos.enderecos.excluir', ['id' => $endereco->EnderecoID ]) }}">Excluir!</a>
                                            </button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
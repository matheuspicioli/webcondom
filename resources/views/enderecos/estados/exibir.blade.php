@extends('layouts.app')
@section('titulo', 'Estados - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar estado</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('enderecos.estados.listar') }}">Voltar</a></h4>
                                <hr>
                                    <form method="post" action="{{ route('enderecos.estados.alterar', ['id' => $estado->EstadoID ]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                            <label for="Descricao" class="control-label">Descrição</label>
                                            <input id="Descricao" type="text" class="form-control" name="Descricao" value="{{ $estado->Descricao}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="Sigla" class="control-label">Sigla</label>
                                            <input type="text" id="Sigla" name="Sigla" class="form-control" value="{{ $estado->Sigla }}">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                            <button class="btn btn-danger">
                                                <a style="color: #FFFFFF"
                                                   href="{{ route('enderecos.estados.excluir', ['id' => $estado->EstadoID ]) }}">Excluir!</a>
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
@extends('layouts.app')
@section('titulo', 'Departamentos - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar Departamentos</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('diversos.departamento.listar') }}">Voltar</a></h4>
                                <hr>
                                    <form method="post" action="{{ route('diversos.departamento.alterar', ['id' => $departamento->id ]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="Descricao" class="control-label">Descrição</label>
                                                <input id="Descricao" type="text" class="form-control" name="Descricao" value="{{ $departamento->Descricao}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" type="submit">Salvar</button>
                                                <button class="btn btn-danger">
                                                    <a style="color: #FFFFFF"
                                                       href="{{ route('diversos.departamento.excluir', ['id' => $departamento->id ]) }}">Excluir!</a>
                                                </button>
                                            </div>
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

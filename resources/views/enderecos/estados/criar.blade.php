@extends('layouts.app')
@section('titulo', 'Estados - Criar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Cadastrar estado</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('enderecos.estados.listar') }}">Voltar</a></h4>
                                <hr>
                                <form method="post" action="{{ route('enderecos.estados.salvar') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="Descricao" class="control-label">Descrição</label>
                                        <input id="Descricao" type="text" class="form-control" name="Descricao">
                                    </div>

                                    <div class="form-group">
                                        <label for="Sigla" class="control-label">Sigla</label>
                                        <input type="text" id="Sigla" name="Sigla" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="CodigoIBGE" class="control-label">Código IBGE</label>
                                        <input type="text" id="CodigoIBGE" name="CodigoIBGE" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Cadastrar</button>
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

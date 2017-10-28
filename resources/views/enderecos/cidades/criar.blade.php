@extends('layouts.app')
@section('titulo', 'Cidades - Cadastrar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Cadastrar cidade</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('enderecos.cidades.listar') }}">Voltar</a></h4>
                                <hr>
                                <form method="post" action="{{ route('enderecos.cidades.salvar') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="Descricao" class="control-label">Descrição</label>
                                        <input id="Descricao" type="text" class="form-control" name="Descricao">
                                    </div>

                                    <div class="form-group">
                                        <label for="CodigoIBGE" class="control-label">Codigo IBGE(Opcional)</label>
                                        <input type="text" id="CodigoIBGE" name="CodigoIBGE" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="EstadoCOD" class="control-label"></label>
                                        <select name="EstadoCOD" id="EstadoCOD" class="form-control">
                                            <option selected disabled>-------Selecione um estado-------</option>
                                            @foreach($estados as $estado)
                                                <option value="{{ $estado->EstadoID }}">{{ $estado->Descricao }}</option>
                                            @endforeach
                                        </select>
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
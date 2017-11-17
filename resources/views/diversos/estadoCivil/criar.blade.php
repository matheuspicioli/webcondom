@extends('layouts.app')
@section('titulo', 'Estado Civil - Criar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Cadastrar Estado Civil</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('diversos.estadoCivil.listar') }}">Voltar</a></h4>
                                <hr>
                                <form method="post" action="{{ route('diversos.estadoCivil.salvar') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="Descricao" class="control-label">Descrição</label>
                                        <input id="Descricao" type="text" class="form-control" name="Descricao">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ExigeConjuge" class="control-label">Exige Conjuge?</label>
                                                <select name="ExigeConjuge" id="ExigeConjuge" class="form-control pula">
                                                    <option disabled selected>Selecione</option>
                                                    <option value="1">Sim</option>
                                                    <option value="0">Não</option>
                                                </select>
                                            </div>
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

@extends('layouts.app')
@section('titulo', 'Estado Civil - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar Estado Civil</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('diversos.estadoCivil.listar') }}">Voltar</a></h4>
                                <hr>
                                    <form method="post" action="{{ route('diversos.estadoCivil.alterar', ['id' => $estadoCivil->id ]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="Descricao" class="control-label">Descrição</label>
                                                <input id="Descricao" type="text" class="form-control" name="Descricao" value="{{ $estadoCivil->Descricao}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ExigeConjuge" class="control-label">Exige Conjuge?</label>
                                                <select name="ExigeConjuge" id="ExigeConjuge" class="form-control pula">
                                                    <option disabled selected>----------Selecione----------</option>
                                                    <option value="1" {{ $estadoCivil->ExigeConjuge == 1 ? 'selected' : '' }}>Sim
                                                    </option>
                                                    <option value="0" {{ $estadoCivil->ExigeConjuge == 0 ? 'selected' : '' }}>Não
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" type="submit">Salvar</button>
                                                <button class="btn btn-danger">
                                                    <a style="color: #FFFFFF"
                                                       href="{{ route('diversos.estadoCivil.excluir', ['id' => $estadoCivil->id ]) }}">Excluir!</a>
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

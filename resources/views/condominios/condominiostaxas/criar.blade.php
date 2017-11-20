@extends('layouts.app')
@section('titulo', 'Taxa de condomínios - Cadastrar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Cadastrar taxa de condomínio</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><a href="{{ route('condominios.condominiostaxas.listar', ['idCondominio' => $idCondominio]) }}">Voltar</a></h4>
                                <hr>
                            </div>
                        </div>
                        <form method="post" action="{{ route('condominios.condominiostaxas.salvar') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Descricao" class="control-label">Descrição</label>
                                        <input id="Descricao" type="text" class="form-control" name="descricao">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Valor" class="control-label">Valor</label>
                                        <input id="Valor" type="text" class="form-control" name="valor">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="CondominioCOD" class="control-label">Condomínio</label>
                                        <select name="condominio_id" id="CondominioCOD" class="form-control">
                                            <option value="" selected disabled>-----Escolha um-----</option>
                                            @foreach($condominios as $condominio)
                                                <option value="{{ $condominio->id }}">{{ $condominio->condominioDescricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
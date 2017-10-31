@extends('layouts.app')
@section('titulo', 'Sindicos - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar sindico</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('condominios.sindicos.listar') }}">Voltar</a></h4>
                                <hr>
                                <form method="post"
                                      action="{{ route('condominios.sindicos.alterar', ['id' => $sindico->SindicoID ]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label">Nome</label>
                                        <input id="Nome" type="text" class="form-control" name="Nome"
                                               value="{{ $sindico->Nome }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Telefone" class="control-label">Telefone</label>
                                        <input type="text" id="Telefone" name="Telefone" class="form-control"
                                               value="{{ $sindico->Telefone ? $sindico->Telefone : '' }}">
                                        <span class="helper-block">Este campo é opcional</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input type="text" id="Celular" name="Celular" class="form-control"
                                               value="{{ $sindico->Celular }}">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Alterar</button>
                                        <button class="btn btn-danger"><a
                                                    href="{{ route('condominios.sindicos.excluir', ['id' => $sindico->SindicoID]) }}"
                                                    style="color: #FFFFFF">Excluir</a></button>
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
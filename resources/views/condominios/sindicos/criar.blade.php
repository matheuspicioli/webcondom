@extends('layouts.app')
@section('titulo', 'Sindicos - Cadastrar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Cadastrar sindico</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4><a href="{{ route('condominios.sindicos.listar') }}">Voltar</a></h4>
                                <hr>
                                <form method="post" action="{{ route('condominios.sindicos.salvar') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="Nome" class="control-label">Nome</label>
                                        <input id="Nome" type="text" class="form-control" name="nome">
                                    </div>

                                    <div class="form-group">
                                        <label for="Telefone" class="control-label">Telefone</label>
                                        <input type="text" id="Telefone" name="telefone" class="form-control">
                                        <span class="helper-block">Este campo é opcional</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input type="text" id="Celular" name="celular" class="form-control">
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
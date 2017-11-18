@extends('layouts.app')
@section('titulo', 'Estados - Lista')
@section('conteudo')
    <pagina tamanho="12">
        <painel titulo="Lista de estados" cor="panel-primary">
            <migalha v-bind:lista="{{ $migalhas }}"></migalha>
            <modal-link tipo="button" nome="modalCadastraEstado" titulo="Modal cadastra estado"></modal-link>
            <a href="{{ route('enderecos.estados.criar') }}" class="btn btn-primary">Cadastrar</a>
            <a href="{{ route('home') }}" class="btn btn-default" >Voltar</a>
            <hr />
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Sigla</th>
                    <th>Código IBGE</th>
                </tr>
                </thead>
                <tbody>
                @foreach($estados as $estado)
                    <tr>
                        <td>{{ $estado->id }}</td>
                        <td>{{ $estado->descricao }}</td>
                        <td>{{ $estado->sigla }}</td>
                        <td>{{ $estado->codigo_ibge }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </painel>
    </pagina>
    <modal nome="modalCadastraEstado">
        <painel cor="panel-primary" titulo="Cadastrar estado">
            <formulario action="{{ route('enderecos.estados.salvar') }}" method="POST" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Descricao" class="control-label">Descrição</label>
                    <input id="Descricao" type="text" class="form-control" name="descricao">
                </div>

                <div class="form-group">
                    <label for="Sigla" class="control-label">Sigla</label>
                    <input type="text" id="Sigla" name="sigla" class="form-control">
                </div>

                <div class="form-group">
                    <label for="CodigoIBGE" class="control-label">Código IBGE</label>
                    <input type="text" id="CodigoIBGE" name="codigo_ibge" class="form-control">
                    <span class="help-block">Este campo é opcional</span>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </formulario>
        </painel>
    </modal>
@endsection

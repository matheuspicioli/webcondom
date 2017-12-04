@extends('layouts.app')
@section('titulo', 'Menu')
@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="text-center">Menu</h4></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Condomínios</h3>
                                    <ul>
                                        <li><a class="btn btn-default" href="{{ route('condominios.condominios.listar') }}">Condomínios</a></li>
                                        <li><a class="btn btn-default" href="{{ route('condominios.sindicos.listar') }}">Sindicos</a></li>
                                        <li><a class="btn btn-default" href="{{ route('condominios.imoveis.listar') }}">Imóveis</a></li>
                                    </ul>
                                    <h3>Entidades</h3>
                                    <ul>
                                        <li><a class="btn btn-default" href="{{ route('entidades.proprietarios.listar') }}">Proprietarios</a></li>
                                        <li><a class="btn btn-default" href="{{ route('entidades.fornecedores.listar') }}">Fornecedores</a></li>
                                        <li><a class="btn btn-default" href="{{ route('entidades.funcionarios.listar') }}">Funcionários</a></li>
                                        <li><a class="btn btn-default" href="{{ route('entidades.empresas.listar') }}">Empresas</a></li>
                                    </ul>
                                    <h3>Endereços</h3>
                                    <ul>
                                        <li><a class="btn btn-default" href="{{ route('enderecos.cidades.listar') }}">Cidades</a></li>
                                        <li><a class="btn btn-default" href="{{ route('enderecos.estados.listar') }}">Estados</a></li>
                                    </ul>
                                    <h3>Diversos</h3>
                                    <ul>
                                        <li><a class="btn btn-default" href="{{ route('diversos.departamento.listar') }}">Departamentos</a></li>
                                        <li><a class="btn btn-default" href="{{ route('diversos.estadoCivil.listar') }}">Estado Civil</a></li>
                                        <li><a class="btn btn-default" href="{{ route('diversos.regimeCasamento.listar') }}">Regimes de Casamento</a></li>
                                        <li><a class="btn btn-default" href="{{ route('diversos.setores.listar') }}">Setores</a></li>
                                        <li><a class="btn btn-default" href="{{ route('diversos.categorias.listar') }}">Categorias</a></li>
                                        <li><a class="btn btn-default" href="{{ route('diversos.tiposimoveis.listar') }}">Tipos imóveis</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

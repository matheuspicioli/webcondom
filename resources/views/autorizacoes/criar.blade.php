@extends('adminlte::page')
@section('title', 'Autorização - Cadastrar')
@section('content_header')
    <h1>Cadastro
        <small>de autorizações</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-group"></i> Autorizações</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar autorização
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="#" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can('autorizacoes')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar permissão</h3>
                        <div class="box-tool pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('autorizacoes.permissoes.salvar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nome_permissao" class="control-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="nome_permissao">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="descricao_permissao" class="control-label">Descrição</label>
                                        <input type="text" name="descricao" class="form-control"
                                               id="descricao_permissao">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i> Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar perfil</h3>
                        <div class="box-tool pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('autorizacoes.roles.salvar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nome_perfil" class="control-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="nome_perfil">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="descricao_perfil" class="control-label">Descricao</label>
                                        <input type="text" class="form-control" name="descricao_perfil"
                                               id="descricao_perfil">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i> Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Associar perfil com permissão</h3>
                        <div class="box-tool pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('autorizacoes.role_permissao_associar.salvar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="perfil_permissao" class="control-label">Perfis</label>
                                        <select name="role_id" class="form-control select2" id="perfil_permissao">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">#{{ $role->id }} - {{ $role->nome }} - {{ $role->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="permissao_perfil" class="control-label">Permissões</label>
                                        <select name="permissao_id" class="form-control select2" id="permissao_perfil">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($permissoes as $permissao)
                                                <option value="{{ $permissao->id }}">#{{ $permissao->id }} - {{ $permissao->nome }} - {{ $permissao->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i> Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Associar usuário com perfil</h3>
                        <div class="box-tool pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('autorizacoes.role_usuario_associar.salvar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="usuarios" class="control-label">Usuários</label>
                                        <select name="usuario_id" class="form-control select2" id="usuarios">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}">#{{ $usuario->id }} - {{ $usuario->name }} - {{ $usuario->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_usuario" class="control-label">Perfil</label>
                                        <select name="role_id" class="form-control select2" id="role_usuario">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">#{{ $role->id }} - {{ $role->nome }} - {{ $role->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i> Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3>Você não tem permissão para mexer em autorizações</h3>
    @endcan
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $("#nome_permissao").focus();
        });
    </script>
@stop
@extends('adminlte::page')
@section('title', 'Condominios - Listar')
@section('content_header')
    <h1>Condomínios - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Condomínios
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.condominios.criar') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cadastrar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Condomínios</h3>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($condominios as $condominio)
                            <tr>
                                <td>{{ $condominio->id }}</td>
                                <td>{{ $condominio->nome }}</td>
                                <td>{{ $condominio->endereco->endereco_formatado }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('condominios.condominios.exibir', ['id' => $condominio->id ]) }}">
                                        <i class="fa fa-pencil"></i> Alterar</a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#tabela').DataTable()
        });
    </script>
@stop
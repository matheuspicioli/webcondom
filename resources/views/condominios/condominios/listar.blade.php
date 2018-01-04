@extends('adminlte::page')
@section('title', 'Condominios - Listar')
@section('content_header')
    <h1>Condomínios - <small>listagem</small></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('condominios.condominios.criar') }}" class="btn btn-primary">
                Criar
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
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
                                    <a class="btn btn-success"
                                       href="{{ route('condominios.condominios.exibir', ['id' => $condominio->id ]) }}">Alterar</a>
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
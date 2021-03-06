@extends('adminlte::page')
@section('title', 'Fornecedores - Listar')
@section('content_header')
    <h1>Fornecedores - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Fornecedores
        </li>
    </ol>
@stop

@section('content')
    @can("listar_fornecedor")
        <div class="row">
            <div class="col-md-1">
                @can("incluir_fornecedor")
                    <a href="{{ route('entidades.fornecedores.criar') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Cadastrar</a>
                @else
                    <button disabled type="button" class="btn btn-success">
                        <i class="fa fa-plus"></i> Cadastrar</button>
                @endcan
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fornecedores</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Fantasia</th>
                                <th>CPF/CNPJ</th>
                                <th>Apelido</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Fantasia</th>
                                <th>CPF/CNPJ</th>
                                <th>Apelido</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->id }}</td>
                                    <td>{{ $fornecedor->entidade->nome }}</td>
                                    <td>{{ $fornecedor->entidade->fantasia }}</td>
                                    <td @if($fornecedor->entidade->tipo == "CPF") data-mask="999.999.999-99" @else data-mask="99.999.999/9999-99" @endif >{{ $fornecedor->entidade->cpf_cnpj }}</td>
                                    <td>{{ $fornecedor->entidade->apelido }}</td>
                                    <td>
                                        @can("exibir_fornecedor")
                                            <a class="btn btn-xs btn-warning" href="{{ route('entidades.fornecedores.exibir', ['id' => $fornecedor->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("deletar_fornecedor")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$fornecedor->id}}" href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan
                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$fornecedor->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja realmente excluir o fornecedor "{{ $fornecedor->nome }}"?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('entidades.fornecedores.excluir', ['id' => $fornecedor->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{mensagem_permissao()}}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
@section('js')
    <script>
        $(function () {
            $('#tabela').DataTable({
                "order": [[ 1, "asc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
@stop

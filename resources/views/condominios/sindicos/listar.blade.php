@extends('adminlte::page')
@section('title', 'Síndicos - Listar')
@section('content_header')
    <h1>Síndicos - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Síndicos
        </li>
    </ol>
@stop

@section('content')
    @can("listar_sindico")
        <div class="row">
            <div class="col-md-1">
                @can("incluir_sindico")
                    <a href="{{ route('condominios.sindicos.criar') }}" class="btn btn-success">
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
                        <h3 class="box-title">Síndicos</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            @foreach($sindicos as $sindico)
                                <tr>
                                    <td>{{ $sindico->id }}</td>
                                    <td>{{ $sindico->nome }}</td>
                                    <td data-mask="(99) 9999-9999">{{ $sindico->telefone ? $sindico->telefone : 'Não informado' }}</td>
                                    <td data-mask="(99) 99999-9999">{{ $sindico->celular ? $sindico->celular : 'Não informado' }}</td>
                                    <td>
                                        @can("exibir_sindico")
                                            <a class="btn btn-sm btn-warning" href="{{ route('condominios.sindicos.exibir', ['id' => $sindico->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-sm btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("deletar_sindico")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$sindico->id}}" href="#" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan
                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$sindico->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja realmente excluir o Síndico "{{ $sindico->nome }}"?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('condominios.sindicos.excluir', ['id' => $sindico->id]) }}">
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
@stop

@section('js')
    <script src="{{ asset('js/mask/jquery.mask.min.js') }}"></script>
    <script>
        $(function () {
            $('#tabela').DataTable({
                "order": [[ 1, "asc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
        })
        });
    </script>
@stop
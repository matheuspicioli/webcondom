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
    @can("listar_condominio")
        <div class="row">
            <div class="col-md-1">
                @can("incluir_condominio")
                    @component('formularios.Link',[
						'link'		=> route('condominios.condominios.criar'),
						'classes'	=> 'btn btn-success',
						'icone'		=> 'fa fa-plus',
						'texto'		=> 'Cadastrar'
					])@endcomponent
                @else
					@component('formularios.Link',[
						'link'		=> route('condominios.condominios.criar'),
						'classes'	=> 'btn btn-success',
						'icone'		=> 'fa fa-plus',
						'texto'		=> 'Cadastrar',
						'atributos'	=> 'disabled'
					])@endcomponent
                @endcan
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
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($condominios as $condominio)
                                <tr>
                                    <td>{{ $condominio->id }}</td>
                                    <td>{{ $condominio->nome }}</td>
                                    <td>{{ $condominio->apelido }}</td>
                                    <td>{{ $condominio->endereco->endereco_formatado }}</td>
                                    <td>
                                        @can("exibir_condominio")
                                            <a class="btn btn-xs btn-warning" href="{{ route('condominios.condominios.exibir', ['id' => $condominio->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("listar_unidade")
                                            <a class="btn btn-xs btn-primary" href="{{ route('condominios.unidades.listar', ['idCondominio' => $condominio->id ]) }}">
                                                <i class="fa fa-th-list"></i></a>
                                        @else
                                                <button disabled type="button" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-th-list"></i></button>
                                        @endcan
                                        @can("deletar_condominio")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$condominio->id}}" href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan
                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$condominio->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                           </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja realmente excluir o condomínio "{{ $condominio->nome }}"?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('condominios.condominios.excluir', ['id' => $condominio->id]) }}">
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
    <script>
        $(function () {
            $('#tabela').DataTable({
                "order": [[ 2, "asc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            })
        });
    </script>
@stop
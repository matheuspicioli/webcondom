@extends('adminlte::page')
@section('title', 'Unidades - Listar')
@section('content_header')
    <h1>Unidades - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-group"></i> Unidades
        </li>
    </ol>
@stop
@section('content')
    @can("listar_unidade")
        <!--<div class="fa fa-spinner fa-spin" id="carregando"></div>-->
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('condominios.condominios.listar') }}" class="btn btn-default btn-sm">
                    <i class="fa fa-rotate-left"></i> Voltar
                </a>
                @can("incluir_unidade")
                    <a href="{{ route( 'condominios.unidades.criar', [ 'idCondominio' => $condominio->id ]) }}" class="btn btn-success btn-sm">
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
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados do Condomínios -> {{ $condominio->nome }} - {{ $condominio->apelido }}</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="condominio" class="control-label">Condomínio</label>
                                    <input id="condominio" type="text" class="form-control pula" name="condominio"
                                           disabled="disabled" value="{{ $condominio->nome }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apelido" class="control-label">Apelido</label>
                                    <input id="apelido" type="text" class="form-control pula" name="apelido"
                                           disabled="disabled" value="{{ $condominio->apelido }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="codigo" class="control-label">Código</label>
                                    <input id="codigo" type="text" class="form-control pula" name="codigo"
                                           disabled="disabled" value="{{ $condominio->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista de Unidades</h3>
                    </div>

                    <hr>
                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>Bl/Qd</th>
                                <th>Unidade</th>
                                <th>Proprietário</th>
                                <th>Inquilino</th>
                                <th>Indice</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Bl/Qd</th>
                                <th>Unidade</th>
                                <th>Proprietário</th>
                                <th>Inquilino</th>
                                <th>Indice</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($unidades as $unidade)
                                <tr>
                                    <td>{{ $unidade->bloco }}</td>
                                    <td>{{ $unidade->unidade }}</td>
                                    <td>{{ $unidade->proprietario->entidade->nome }}</td>
                                    <td>{{ $unidade->inquilino_id ? $unidade->inquilino->entidade->nome : 'Não informado' }}</td>
                                    <td>{{ $unidade->indice }}</td>
                                    <td>
                                            <a class="btn btn-xs btn-warning" href="{{ route('condominios.unidades.exibir', ['id' => $unidade->id, 'idCondominio' => $unidade->condominio_id ]) }}" title="Editar">
                                            <i class="fa fa-pencil"></i></a>
                                        <button type="button" data-toggle="modal"
                                                data-target="#modal-danger-{{$unidade->id}}" href="#"
                                                class="btn btn-xs btn-danger" title="Excluir">
                                            <i class="fa fa-trash"></i></button>
                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$unidade->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Dados da exclusão: </h3>
                                                        <p>Bloco:   {{ $unidade->bloco }}</p>
                                                        <p>Unidade: {{ $unidade->unidade }}</p>
                                                        <p>Proprietário:   {{ $unidade->proprietario->entidade->nome }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('condominios.unidades.excluir', ['id' => $unidade->id, 'idCondominios' => $unidade->condominio_id ]) }}">
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
        <div id="modal-erro" class="modal modal-danger fade" data-toggle="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="modal-title">Erro</h3>
                    </div>
                    <div class="modal-body">
                        <h4 id="mensagem-erro"></h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" id="botao-fechar-modal-erro"
                                data-dismiss="modal">Fechar
                        </button>
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
	<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>
    <script>
        $(document).ready(function () {
            $.fn.dataTable.moment('DD/MM/YYYY');
            $('#tabela').DataTable({
                "order": [[ 0, "asc" ]],
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            });
            $('.select2').select2();
            $('#data').focus();
        });
    </script>
@stop

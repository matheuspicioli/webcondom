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
							@component('formularios.Botao', [
								'classes'		=> 'btn-box-tool',
								'atributos'		=> 'type=button data-widget=collapse',
								'icone'			=> 'fa fa-minus'
							])@endcomponent
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group">
									@component('formularios.String',[
										'id'		=> 'condominio',
										'nome'		=> 'condominio',
										'texto'		=> 'Condomínio',
										'valor'		=> $condominio->nome ?? '',
										'tabindex'	=> '1',
										'atributos'	=> 'disabled'
									])@endcomponent
								</div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
									@component('formularios.String',[
										'id'		=> 'apelido',
										'nome'		=> 'apelido',
										'texto'		=> 'Apelido',
										'valor'		=> $condominio->apelido ?? '',
										'tabindex'	=> '1',
										'atributos'	=> 'disabled'
									])@endcomponent
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
									@component('formularios.String',[
										'id'		=> 'codigo',
										'nome'		=> 'codigo',
										'texto'		=> 'Código',
										'valor'		=> $condominio->id ?? '',
										'tabindex'	=> '1',
										'atributos'	=> 'disabled'
									])@endcomponent
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
                                    <td>{{ isset($unidade->inquilino) ? $unidade->inquilino->entidade->nome : 'Não informado' }}</td>
                                    <td>{{ $unidade->indice }}</td>
                                    <td>
										<a class="btn btn-xs btn-warning" href="{{ route('condominios.unidades.exibir', ['id' => $unidade->id, 'idCondominio' => $unidade->condominio_id ]) }}" title="Editar">
                                            <i class="fa fa-pencil"></i>
										</a>
										@component('formularios.Botao', [
											'classes'		=> 'btn-xs btn-danger',
											'atributos'		=> 'type=button',
											'icone'			=> 'fa fa-trash',
											'titulo'		=> 'Excluir',
											'target'		=> "#modal-danger-{$unidade->id}",
											'toggle'		=> 'modal'
										])@endcomponent
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
														@component('formularios.Botao', [
															'classes'		=> 'btn-outline pull-left',
															'atributos'		=> 'type=button data-dismiss=modal',
															'texto'			=> 'Fechar'
														])@endcomponent
                                                        <form method="POST" action="{{ route('condominios.unidades.excluir', ['id' => $unidade->id, 'idCondominios' => $unidade->condominio_id ]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
															@component('formularios.Botao', [
																'classes'		=> 'btn-outline',
																'atributos'		=> 'type=submit',
																'icone'			=> 'fa fa-trash',
																'texto'			=> 'Confirmar exclusão'
															])@endcomponent
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
                        <h3 class="box-title">{{ mensagem_permissao() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@stop

@section('js')
	<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#tabela').DataTable({
                "order": [[ 0, "asc" ]],
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
@stop

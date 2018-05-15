@extends('adminlte::page')
@section('title', 'Balancete lançamentos - Listar')
@section('content_header')
    <h1>Balancete lançamentos - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Balancete lançamentos
        </li>
    </ol>
@stop

@section('content')
    @can("listar_balancete_lancamentos")
        <div class="row">
            <div class="col-md-3">
				<a href="{{ route('financeiros.balancetes.listar') }}" class="btn btn-default btn-sm">
					<i class="fa fa-rotate-left"></i> Voltar
				</a>
                @can("incluir_balancete_lancamentos")
                    <a href="{{ route( 'balancetes.lancamentos.criar', [ 'idBalancete' => $idBalancete ] ) }}" class="btn btn-success btn-sm">
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
                        <h3 class="box-title">Balancetes</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>Folha</th>
								<th>Documento</th>
								<th>Pl.Conta</th>
                                <th>Descrição Plano Conta</th>
                                <th>Histórico</th>
                                <td><b>Crédito</b></td>
                                <td><b>Débito</b></td>
								<th>Fornecedor</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Folha</th>
                                <th>Documento</th>
                                <th>Pl.Conta</th>
                                <th>Descrição Plano Conta</th>
                                <th>Histórico</th>
                                <td><b>{{ isset($credito_periodo) ? number_format($credito_periodo, 2,',','.') : number_format(0, 2,',','.') }}</b></td>
                                <td><b>{{ isset($debito_periodo) ? number_format($debito_periodo, 2,',','.') : number_format(0, 2,',','.') }}</b></td>
                                <th>Fornecedor</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($balancete_lancamentos as $lancamento)
                                <tr>
                                    <td>{{ $lancamento->folha }}</td>
                                    <td>{{ $lancamento->documento }}</td>
                                    <td>{{ $lancamento->plano_conta->grupo->plano_de_conta->tipo }}.{{ $lancamento->plano_conta->grupo->grupo }}.{{ $lancamento->plano_conta->conta }}</td>
                                    <td>{{ $lancamento->plano_conta->descricao  }}</td>
                                    <td>{{ $lancamento->historico }}</td>
                                    <td class="align-right"><b>{{ $lancamento->tipo == 'Credito' ? $lancamento->valor : '' }}</b></td>
                                    <td class="align-right"><b>{{ $lancamento->tipo == 'Debito' ? $lancamento->valor : '' }}</b></td>
									<td>{{ $lancamento->fornecedor_id ? $lancamento->fornecedor->entidade->nome : '' }}</td>
                                    <td>
                                        @can("exibir_balancete_lancamentos")
                                            <a class="btn btn-xs btn-warning" href="{{ route('balancetes.lancamentos.exibir', ['id' => $lancamento->id ]) }}" title="Alterar">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-warning" title="Alterar">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("deletar_balancete_lancamentos")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$lancamento->id}}" href="#" class="btn btn-xs btn-danger" title="Excluir">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" data-toggle="modal" data-target="#modal-danger-{{$lancamento->id}}" href="#" class="btn btn-xs btn-danger" title="Excluir">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan
                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$lancamento->id}}" class="modal modal-danger fade">
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
                                                        <table class="table table-striped table-bordered">
                                                            <tr>
                                                                <td>Data: </td>
                                                                <td>{{ $lancamento->data_lancamento->format('d/m/Y') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Documento: </td>
                                                                <td>{{ $lancamento->documento }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Histórico: </td>
                                                                <td>{{ $lancamento->historico }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valor: </td>
                                                                <td>{{ $lancamento->valor }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('balancetes.lancamentos.excluir', ['id' => $lancamento->id]) }}">
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
							@empty
								Nenhum lançamento desse balancete encontrado
                            @endforelse
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>
    <script>
        $(function () {
        	$('.select2').select2();
			$('#tabela').DataTable({
				"order": [[ 1, "asc" ],[ 2, "asc" ]],
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
				}
			} )
        });
    </script>
@stop
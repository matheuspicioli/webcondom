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
            <div class="col-md-1">
                @can("incluir_balancete_lancamentos")
                    <a href="{{ route('balancetes.lancamentos.criar') }}" class="btn btn-success">
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
                                <th>#</th>
								<th>Data lançamento</th>
								<th>Documento</th>
                                <th>Valor</th>
                                <th>Tipo</th>
								<th>Folha</th>
                                <th>Fornecedor</th>
								<th>Plano de conta</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Data lançamento</th>
                                <th>Documento</th>
                                <th>Valor</th>
                                <th>Tipo</th>
                                <th>Folha</th>
								<th>Fornecedor</th>
								<th>Plano de conta</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($balancete_lancamentos as $lancamento)
                                <tr>
                                    <td>{{ $lancamento->id }}</td>
                                    <td>{{ $lancamento->data_lancamento->format('d/m/Y') }}</td>
                                    <td>{{ $lancamento->documento }}</td>
                                    <td>R$ {{ $lancamento->valor }}</td>
                                    <td>{{ $lancamento->tipo }}</td>
									<td>{{ $lancamento->folha }}</td>
									<td>{{ $lancamento->fornecedor->entidade->nome }}</td>
									<td>{{ $lancamento->plano_conta->grupo->plano_de_conta->tipo }}.{{ $lancamento->plano_conta->grupo->grupo }}.{{ $lancamento->plano_conta->conta }}</td>
                                    <td>
                                        @can("exibir_balancete_lancamentos")
                                            <a class="btn btn-xs btn-warning" href="{{ route('balancetes.lancamentos.exibir', ['id' => $lancamento->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("deletar_balancete_lancamentos")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$lancamento->id}}" href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" data-toggle="modal" data-target="#modal-danger-{{$lancamento->id}}" href="#" class="btn btn-xs btn-danger">
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
                                                        <h4>Deseja realmente excluir o lançamento de balancete com o documento
															{{ $lancamento->documento }}, data de lançamento {{ $lancamento->data_lancamento->format('d/m/Y') }}?</h4>
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
        	//$('.select2').select2();
            $('#tabela').DataTable({
				"order": [[ 1, "asc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
@stop
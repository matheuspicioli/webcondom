@extends('adminlte::page')
@section('title', 'Balancetes - Listar')
@section('content_header')
    <h1>Balancetes - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Balancetes
        </li>
    </ol>
@stop

@section('content')
    @can("listar_balancete")
		<form action="{{ route('financeiros.balancetes.listarPost') }}" method="POST">
			{{ csrf_field() }}
        	<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="form-group">
						<label for="conodominio" class="control-label">Condomínio</label>
						<select name="condominio_id" id="conodominio" class="form-control">
							<option value="" selected disabled>------------------------SELECIONE------------------------</option>
							@forelse($condominios as $condominio)
								<option value="{{ $condominio->id }}">{{ $condominio->nome }} - {{ $condominio->apelido }}</option>
							@empty
								<option value="">Nenhum condomínio</option>
							@endforelse
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-4">
					<div class="form-group">
						<a class="btn btn-default" href="{{ route('financeiros.balancetes.listar') }}">Limpar filtro</a>
						<button type="submit" class="btn btn-success">Filtrar</button>
					</div>
				</div>
			</div>
		</form>
        <div class="row">
            <div class="col-md-1">
                @can("incluir_balancetes")
                    <a href="{{ route('financeiros.balancetes.criar') }}" class="btn btn-success">
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
                        <h3 class="box-title">Balancetes @if(isset($condominio_titulo)) do condominio {{ $condominio_titulo->nome }} @endif</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>#</th>
								<th>Competência</th>
								<th>Referência</th>
                                <th>Data inicial</th>
                                <th>Data final</th>
								<th>Saldo anterior</th>
								<th>Saldo atual</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>#</th>
								<th>Competência</th>
								<th>Referência</th>
								<th>Data inicial</th>
								<th>Data final</th>
								<th>Saldo anterior</th>
								<th>Saldo atual</th>
								<th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($balancetes as $balancete)
                                <tr>
                                    <td>{{ $balancete->id }}</td>
                                    <td>{{ $balancete->competencia or 'Não preenchido' }}</td>
                                    <td>{{ $balancete->referencia or 'Não preenchido' }}</td>
                                    <td>{{ $balancete->data_inicial->format('d/m/Y') }}</td>
                                    <td>{{ $balancete->data_final->format('d/m/Y') }}</td>
									<td>R$ {{ $balancete->saldo_anterior }}</td>
									<td>R$ {{ $balancete->saldo_atual }}</td>
                                    <td>
										<a href="{{ route('balancetes.lancamentos.listar',['idBalancete' => $balancete->id]) }}" class="btn btn-xs btn-success">
											<i class="fa fa-th-list"></i>
										</a>
                                        @can("exibir_balancete")
                                            <a class="btn btn-xs btn-warning" href="{{ route('financeiros.balancetes.exibir', ['id' => $balancete->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan
                                        @can("deletar_balancete")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$balancete->id}}" href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" data-toggle="modal" data-target="#modal-danger-{{$balancete->id}}" href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan
                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$balancete->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                           </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja realmente excluir o balancete com o período entre
															{{ $balancete->data_inicial->format('d/m/Y') }} - {{ $balancete->data_final->format('d/m/Y') }}?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('financeiros.balancetes.excluir', ['id' => $balancete->id]) }}">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>
    <script>
        $(function () {
        	//$('.select2').select2();
            $('#tabela').DataTable({
				"order": [[ 3, "asc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
@stop
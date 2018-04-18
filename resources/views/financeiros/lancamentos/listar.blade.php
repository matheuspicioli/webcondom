@extends('adminlte::page')
@section('title', 'Lançamentos conta corrente - Listar')
@section('content_header')
    <h1>Lançamentos conta corrente -
        <small>listagem</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-group"></i> Lançamentos conta corrente
        </li>
    </ol>
@stop

@section('content')
    <!--<div class="fa fa-spinner fa-spin" id="carregando"></div>-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados da conta corrente</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-plus"></i>
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
								<label for="conta_corrente" class="control-label">Conta corrente</label>
								<select name="conta_corrente_id" id="conta_corrente" class="form-control"
										disabled="disabled">
									<option selected disabled>===============SELECIONE===============</option>
									@foreach($contas as $contaSelect)
										<option value="{{ $contaSelect->id }}" {{ $contaSelect->id == $contaL->id ? 'selected' : '' }}>
											{{ $contaSelect->agencia }} - {{ $contaSelect->conta }}
										</option>
									@endforeach
								</select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="codigo" class="control-label">Código</label>
                                <input id="codigo" type="text" class="form-control pula" name="codigo"
                                       disabled="disabled" value="{{ $contaL->codigo }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banco" class="control-label">Banco</label>
                                <input id="banco" type="text" class="form-control pula" name="banco"
                                       disabled="disabled" value="{{ $contaL->banco->nome_banco }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="agencia" class="control-label">Agência</label>
                                <input id="agencia" type="text" class="form-control pula" name="agencia"
                                       disabled="disabled" value="{{ $contaL->agencia }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="conta" class="control-label">Conta</label>
                                <input id="conta" type="text" class="form-control pula" name="conta"
                                       disabled="disabled" value="{{ $contaL->conta }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="inicio" class="control-label">Início</label>
                                <input id="inicio" type="date" class="form-control pula" name="inicio"
                                       disabled="disabled" value="{{ $contaL->inicio->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label for="principal">
                                    <input type="checkbox" disabled="disabled" name="principal" id="principal"
                                           class="" {{ $contaL->principal ? "checked" : '' }}> Principal?
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--BOX CADASTRO LANÇAMENTO-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Lançamentos conta corrente</h3>
                                    <div class="pull-right">
                                    </div>
                                </div>

                                <div class="box-body">
                                    <form action="{{ route('financeiros.lancamentos.salvar') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="conta_corrente_id" value="{{ $contaL->id }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="data" class="control-label">Data</label>
                                                    <input id="data" type="date" class="form-control pula"
                                                           name="data_lancamento">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="documento" class="control-label">Documento</label>
                                                    <input id="documento" type="text" class="form-control pula"
                                                           name="documento">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tipo_conta" class="control-label">Plano de contas</label>
                                                <select name="plano_conta" id="tipo_conta" class="form-control select2">
                                                    <option selected disabled>SELECIONE</option>
                                                    @foreach($tipos as $tipo)
                                                        @foreach($tipo->grupos as $grupo)
                                                            @foreach($grupo->contas as $conta)
                                                                <option value="{{ $conta->id }}">
                                                                    {{ "$tipo->tipo.$grupo->grupo.$conta->conta" }} -
                                                                    <b>{{ $conta->descricao }}</b>
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- 2ª linha -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="historico" class="control-label">Histórico</label>
                                                    <input id="historico" type="text" class="form-control pula"
                                                           name="historico">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="valor" class="control-label">Valor</label>
                                                    <input id="valor" type="text" class="form-control pula"
                                                           name="valor">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label><input type="radio" name="tipo"
                                                                      value="Debito">Débito</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="tipo"
                                                                      value="Credito">Crédito</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="checkbox" id="compensado-div">
                                                    <label for="compensado">
                                                        <input type="checkbox" class="flat-red" name="compensado"
                                                               id="compensado"> Compensado?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 3ª linha -->
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="fornecedor" class="control-label">Fornecedor</label>
                                                <select name="fornecedor_id" id="fornecedor"
                                                        class="form-control select2">
                                                    <option selected disabled>===============SELECIONE===============
                                                    </option>
                                                    @foreach($fornecedores as $fornecedor)
                                                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->entidade->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nota" class="control-label">Nota fiscal</label>
                                                    <input id="nota" type="text" class="form-control pula"
                                                           name="nota_fiscal">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="parcela" class="control-label">Parcela</label>
                                                    <input id="parcela" type="text" class="form-control pula"
                                                           name="parcela">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 4ª LINHA -->
                                        <div class="row">
                                            <div class="col-md-offset-1">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="checkbox">
                                                            <label for="cheque">
                                                                <input type="checkbox" name="cheque" id="cheque">
                                                                Cheque?
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="enviado_em" class="control-label">Enviado
                                                                em</label>
                                                            <input type="date" name="enviado_em" id="enviado_em"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="retorno_em" class="control-label">Retorno
                                                                em</label>
                                                            <input type="date" name="retorno_em" id="retorno_em"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="checkbox">
                                                            <label for="assinado">
                                                                <input type="checkbox" name="assinado" id="assinado">
                                                                Assinado?
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-save"></i> Salvar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FINAL BOX CADASTRO LANÇAMENTO-->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Listagem lançamentos conta corrente</h3>
                    <div class="pull-right">
                        <a href="{{ route('financeiros.lancamentos.listar',['conta_id' => $contaL->id]) }}"
                           class="btn btn-primary btn-xs">
                            Todos
                        </a>
                        <a href="{{ route('financeiros.lancamentos.listar',['conta_id' => $contaL->id, 'dias' => 7]) }}"
                           class="btn btn-primary btn-xs">
                            Últimos 7 dias
                        </a>
                        <a href="{{ route('financeiros.lancamentos.listar',['conta_id' => $contaL->id, 'dias' => 15]) }}"
                           class="btn btn-primary btn-xs">
                            Últimos 15 dias
                        </a>
                        <a href="{{ route('financeiros.lancamentos.listar',['conta_id' => $contaL->id, 'dias' => 30]) }}"
                           class="btn btn-primary btn-xs">
                            Últimos 30 dias
                        </a>
                        <a class="btn btn-xs btn-success"
                           href="">
                            <i class="fa fa-file-excel-o"></i>
                        </a>
                        <a class="btn btn-xs btn-success"
                           href="">
                            CSV
                        </a>
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-header">
                    <h3 class="box-title"> Período </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('financeiros.lancamentos.listardatas') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="conta_id" value="{{ $contaL->id }}">
                                <div class="form-group-sm">
                                    <div class="col-md-2">
                                        <input type="date" id="inicial" name="data_inicial" class="form-control form"
                                               required="required"
                                               value="{{ isset($data_inicial) ? $data_inicial->format('Y-m-d') : '' }}">
                                    </div>
                                </div>
                                <div class="form-group-sm">
                                    <div class="col-md-2">
                                        <input type="date" id="final" name="data_final" class="form-control"
                                               required="required"
                                               value="{{ isset($data_final) ? $data_final->format('Y-m-d') : '' }}">
                                    </div>
                                </div>
                                <div class="form-group-sm">
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-sm btn-success">Filtar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="box-tools pull-right">
                                    <h3 class="text-green"><b>Saldo compensado: {{ isset($saldo_compensado) ? 'R$: '.number_format($saldo_compensado, 2,',','.') : 'Nenhum lançamento encontrado nesse período' }}</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h3 class="text-muted"><b>Saldo anterior: {{ isset($saldo_anterior) ? 'R$: '.number_format($saldo_anterior, 2,',','.') : 'Nenhum lançamento encontrado nesse período' }}</b></h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="box-tools pull-right">
                                    <h3 class="text-blue"><b>Saldo lançamento: {{ isset($saldo_lancamento) ? 'R$: '.number_format($saldo_lancamento, 2,',','.') : 'Nenhum lançamento encontrado nesse período' }}</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="box-body">
                    <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Documento</th>
                            <th>Histórico</th>
                            <th>Plano contas</th>
                            <th>Crédito</th>
                            <th>Débito</th>
                            <th>Saldo</th>
                            <th>Comp</th>
                            <th>Nota Fiscal</th>
                            <th>Parc</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Data</th>
                            <th>Documento</th>
                            <th>Histórico</th>
                            <th>Plano contas</th>
                            <th>Crédito</th>
                            <th>Débito</th>
                            <th>Saldo</th>
                            <th>Comp</th>
                            <th>Nota Fiscal</th>
                            <th>Parc</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php $saldo_linha = isset($saldo_anterior) ? $saldo_anterior : 0; @endphp
                        @foreach($lancamentos as $lancamento)
                            @php $saldo_linha +=  ($lancamento->tipo == 'Credito') ? $lancamento->valor : $lancamento->valor*-1; @endphp
                            <tr>
                                <td>{{ $lancamento->data_lancamento->format('d/m/Y') }}</td>
                                <td>{{ $lancamento->documento }}</td>
                                <td>{{ $lancamento->historico }}</td>
                                <td>
                                    {{ $lancamento->plano_conta->grupo->plano_de_conta->tipo }}.{{ $lancamento->plano_conta->grupo->grupo }}.{{ $lancamento->plano_conta->conta }}
                                </td>
                                <td align=right>{{ $lancamento->tipo == 'Credito' ?  number_format($lancamento->valor, 2,',','.') : '' }}</td>
                                <td align=right>{{ $lancamento->tipo == 'Debito' ?  number_format($lancamento->valor, 2,',','.') : '' }}</td>
                                <td align=right>{{ number_format($saldo_linha, 2,',','.') }}</td>
                                <td>{{ $lancamento->compensado }}</td>
                                <td>{{ $lancamento->nota_fiscal }}</td>
                                <td>{{ $lancamento->parcela }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-xs" title="Editar">
                                        <i class="fa fa-pencil"></i></a>
                                    <button type="button" data-toggle="modal"
                                            data-target="#modal-danger-{{$lancamento->id}}" href="#"
                                            class="btn btn-xs btn-danger" title="Excluir">
                                        <i class="fa fa-trash"></i></button>
                                    <a href="" class="btn btn-success btn-xs" title="Compensar Cheque">
                                        <i class="fa fa-cc"></i></a>
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
@stop

@section('js')
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
            $('#nota').focus();
        });
    </script>
@stop

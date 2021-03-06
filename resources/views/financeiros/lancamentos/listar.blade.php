@extends('adminlte::page')
@section('title', 'Lançamentos conta corrente - Listar')
@section('content_header')
    <h1>Lançamentos conta corrente - <small>listagem</small></h1>
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
                    <h3 class="box-title">Dados da conta corrente -> {{ $condominio->nome }} - {{ $contaL->banco->nome_banco }} - {{ $contaL->conta }}</h3>
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
                </div>
            </div>
        </div>
    </div>
    <!--BOX CADASTRO LANÇAMENTO-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Lançamentos conta corrente</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <form action="{{ route('financeiros.lancamentos.salvar') }}" method="POST" id="form">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="conta_corrente_id" value="{{ $contaL->id }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group @if($errors->has('data_lancamento')) has-error @endif">
												@component('formularios.Data',[
													'nome' 			=> 'data_lancamento',
													'id'			=> 'data',
													'valor'			=> old('data_lancamento'),
													'tabindex'		=> '1',
													'texto'			=> 'Data',
													'titulo'        => 'Data do Lançamento'
                                                ])@endcomponent
                                                @if( $errors->has('data_lancamento') )
                                                    <span class="help-block">{{ $errors->get('data_lancamento')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group @if($errors->has('documento')) has-error @endif">
												@component('formularios.String',[
													'nome' 			=> 'documento',
													'id'			=> 'documento',
													'valor'			=> old('documento'),
													'tabindex'		=> '2',
													'texto'			=> 'Documento',
													'titulo'        => 'Número do Documento'
                                                ])@endcomponent
                                                @if( $errors->has('documento') )
                                                    <span class="help-block">{{ $errors->get('documento')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group @if($errors->has('plano_conta_id')) has-error @endif">
                                                @component('formularios.Select', [
                                                	'nome' 		=> 'plano_conta_id',
                                                	'id'		=> 'plano_conta_id',
                                                	'tabindex'	=> '3',
                                                	'texto'		=> 'Plano de contas',
                                                	'classes'	=> 'select2',
                                                ])
													<option selected disabled>SELECIONE</option>
													@foreach($tipos as $tipo)
														@foreach($tipo->grupos as $grupo)
															@foreach($grupo->contas as $conta)
																<option value="{{ $conta->id }}" {{ old('plano_conta_id') == $conta->id ? 'selected' : '' }}>
																	{{ "$tipo->tipo.$grupo->grupo.$conta->conta" }} - <b>{{ $conta->descricao }}</b>
																</option>
															@endforeach
														@endforeach
													@endforeach
                                                @endcomponent
                                                @if( $errors->has('plano_conta_id') )
                                                    <span class="help-block">{{ $errors->get('plano_conta_id')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2ª linha -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('historico')) has-error @endif">
												@component('formularios.String',[
													'nome' 			=> 'historico',
													'id'			=> 'historico',
													'valor'			=> old('historico'),
													'texto'			=> 'Histórico',
													'tabindex'		=> '4',
													'titulo'        => 'Informe o Histórico'
                                                ])@endcomponent
                                                @if( $errors->has('historico') )
                                                    <span class="help-block">{{ $errors->get('historico')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group @if($errors->has('valor')) has-error @endif">
												@component('formularios.String',[
													'nome' 			=> 'valor',
													'id'			=> 'valor',
													'valor'			=> old('valor'),
													'texto'			=> 'Valor',
													'tabindex'		=> '5',
													'titulo'        => 'Informe o Valor'
                                                ])@endcomponent
                                                @if( $errors->has('valor') )
                                                    <span class="help-block">{{ $errors->get('valor')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group @if($errors->has('tipo')) has-error @endif">
                                                @component('formularios.Radio',[
													'nome' 		=> 'tipo',
													'id'		=> 'tipo',
													'valor'		=> 'Debito',
													'campo'     => old('tipo'),
													'texto'		=> 'Débito',
													'atributos'	=> 'tabindex=6'
                                                ])@endcomponent
												@component('formularios.Radio',[
													'nome' 		=> 'tipo',
													'id'		=> 'tipo',
													'valor'		=> 'Credito',
													'campo'     => old('tipo'),
													'texto'		=> 'Crédito',
													'atributos'	=> 'tabindex=7'
												])@endcomponent
                                                @if( $errors->has('tipo') )
                                                    <span class="help-block">{{ $errors->get('tipo')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
											<div class="form-group">
												@component('formularios.Checkbox',[
													'id'		=> 'compensado',
													'nome'		=> 'compensado',
													'valor'		=> 'Sim',
													'campo'     => old('compensado'),
													'texto'		=> 'Compensado?',
													'atributos'	=> 'tabindex=8'
												])@endcomponent
											</div>
                                        </div>
                                    </div>
                                    <!-- 3ª linha -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group @if($errors->has('fornecedor_id')) has-error @endif">
												@component('formularios.Select', [
                                                	'nome' 		=> 'fornecedor_id',
                                                	'id'		=> 'fornecedor',
                                                	'tabindex'	=> '9',
                                                	'texto'		=> 'Fornecedor',
                                                	'classes'	=> 'select2',
                                                ])
													<option selected disabled>===============SELECIONE===============</option>
													@foreach($fornecedores as $fornecedor)
														<option value="{{ $fornecedor->id }}" {{ old('fornecedor_id') == $fornecedor->id ? 'selected' : '' }}>
															{{ $fornecedor->entidade->nome }}
														</option>
													@endforeach
												@endcomponent
                                                @if( $errors->has('fornecedor_id') )
                                                    <span class="help-block">
														{{ $errors->get('fornecedor_id')[0] }}
													</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group @if($errors->has('nota_fiscal')) has-error @endif">
												@component('formularios.String',[
													'nome'		=> 'nota_fiscal',
													'id'		=> 'nota',
													'valor'		=> old('nota_fiscal'),
													'texto'		=> 'Nota fiscal',
													'tabindex'	=> '10',
													'titulo'    => 'Número da Nota Fiscal'
												])@endcomponent
                                                @if( $errors->has('nota_fiscal') )
                                                    <span class="help-block">{{ $errors->get('nota_fiscal')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('parcela')) has-error @endif">
												@component('formularios.String',[
													'nome'		=> 'parcela',
													'id'		=> 'parcela',
													'valor'		=> old('parcela'),
													'texto'		=> 'Parcela',
													'tabindex'	=> '11',
													'titulo'    => 'Número da Parcela'
												])@endcomponent
                                                @if( $errors->has('parcela') )
                                                    <span class="help-block">{{ $errors->get('parcela')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 4ª LINHA -->
                                    <div class="row">
                                        <div class="col-md-offset-2">
                                            <div class="row">
                                                <div class="col-md-2">
													<div class="form-group @if($errors->has('cheque')) has-error @endif">
														@component('formularios.Checkbox',[
															'id'		=> 'cheque',
															'nome'		=> 'cheque',
															'valor'		=> 'Sim',
															'campo'     => old('cheque'),
															'texto'		=> 'Cheque?',
															'atributos'	=> 'tabindex=12'
														])@endcomponent
														@if($errors->has('cheque'))
															<span class="help-block">
																{{ $errors->get('cheque')[0] }}
															</span>
														@endif
													</div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group @if($errors->has('enviado_em')) has-error @endif">
														@component('formularios.Data',[
															'nome' 			=> 'enviado_em',
															'id'			=> 'enviado_em',
															'valor'			=> old('enviado_em'),
															'tabindex'		=> '13',
															'texto'			=> 'Enviado em',
															'titulo'        => 'Data de envio do malote'
														])@endcomponent
														@if($errors->has('enviado_em'))
															<span class="help-block">
																{{ $errors->get('enviado_em')[0] }}
															</span>
														@endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group @if($errors->has('retorno_em')) has-error @endif">
														@component('formularios.Data',[
															'nome' 			=> 'retorno_em',
															'id'			=> 'retorno_em',
															'valor'			=> old('retorno_em'),
															'tabindex'		=> '14',
															'texto'			=> 'Retorno em',
															'titulo'        => 'Data de retorno do malote'
														])@endcomponent
														@if($errors->has('retorno_em'))
															<span class="help-block">
																{{ $errors->get('retorno_em')[0] }}
															</span>
														@endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
													<div class="form-group @if($errors->has('assinado')) has-error @endif">
														@component('formularios.Checkbox',[
															'id'		=> 'assinado',
															'nome'		=> 'assinado',
															'valor'		=> 'Sim',
															'campo'     => old('assinado'),
															'texto'		=> 'Assinado ?',
															'atributos'	=> 'tabindex=15'
														])@endcomponent
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @component('formularios.Botao',[
                                                'id'		=> 'salvar',
                                                'classes'	=> 'btn-primary',
                                                'texto'		=> ' Salvar',
                                                'icone'     => 'fa fa-save',
                                                'titulo'    => 'Clique aqui para salvar',
                                                'atributos'	=> 'tabindex=16'
                                            ])@endcomponent
                                        </div>
                                    </div>
                                </form>
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
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="box-tools pull-right">
                                        <h3 class="text-green"><b>Saldo Compensado: {{ isset($saldo_compensado) ? 'R$: '.number_format($saldo_compensado, 2,',','.') : 'Saldo não encontrado nesse período' }}</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="box-tools pull-right">
                                        <h3 class="text-blue"><b>Saldo Lançamento: {{ isset($saldo_lancamento) ? 'R$: '.number_format($saldo_lancamento, 2,',','.') : 'Saldo não encontrado nesse período' }}</b></h3>
                                    </div>
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
                            <td align=right><b>Crédito</b></td>
                            <td align=right><b>Débito</b></td>
                            <td align=right><b>Saldo</b></td>
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
                            <td align=right><b>{{ isset($credito_periodo) ? number_format($credito_periodo, 2,',','.') : number_format(0, 2,',','.') }}</b></td>
                            <td align=right><b>{{ isset($debito_periodo) ? number_format($debito_periodo, 2,',','.') : number_format(0, 2,',','.') }}</b></td>
                            <th></th>
                            <th>Comp</th>
                            <th>Nota Fiscal</th>
                            <th>Parc</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Saldo Inicial</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align=right><b>{{ isset($saldo_anterior) ? number_format($saldo_anterior, 2,',','.') : number_format(0, 2,',','.') }}</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

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
                                        <a class="btn btn-xs btn-warning" href="{{ route('financeiros.lancamentos.exibir', ['id' => $lancamento->id, 'conta_id' => $contaL->id, 'dias' => $dias ]) }}" title="Editar">
                                        <i class="fa fa-pencil"></i></a>
                                    <button type="button" data-toggle="modal"
                                            data-target="#modal-danger-{{$lancamento->id}}" href="#"
                                            class="btn btn-xs btn-danger" title="Excluir">
                                        <i class="fa fa-trash"></i></button>
                                    <button type="button" data-toggle="modal"
											@if($lancamento->compensado == 'Sim') disabled @endif
                                            data-target="#modal-primary-{{$lancamento->id}}" href="#"
                                            class="btn btn-xs btn-primary" title="Compensar Cheque">
                                        <i class="fa fa-cc"></i></button>
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
                                                    <p>Data:   {{ $lancamento->data_lancamento->format('d/m/Y') }}</p>
                                                    <p>Documento: {{ $lancamento->documento }}</p>
                                                    <p>Histórico:   {{ $lancamento->historico }}</p>
                                                    <p>Valor:   {{ number_format($lancamento->valor, 2,',','.') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                    <form method="POST" action="{{ route('financeiros.lancamentos.excluir', ['id' => $lancamento->id, 'conta_id' => $contaL->id, 'dias' => $dias ]) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- MODAL COMPENSAR CHEQUE  -->
                                    <div id="modal-primary-{{$lancamento->id}}" class="modal modal-primary fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h3 class="modal-title">Compensar Lançamento</h3>
                                                </div>
												<form method="POST" action="{{ route('financeiros.lancamentos.compensar', ['id' => $lancamento->id]) }}">
													{{ csrf_field() }}
													{{ method_field('PUT') }}
													<div class="modal-body">
														<h3>Dados do Lançamento: </h3>
														<p>Data:   {{ $lancamento->data_lancamento->format('d/m/Y') }}</p>
														<p>Documento: {{ $lancamento->documento }}</p>
														<p>Histórico:   {{ $lancamento->historico }}</p>
														<p>Valor:   {{ number_format($lancamento->valor, 2,',','.') }}</p>
														<input type="hidden" name="compensado" id="compensado-cc" value="Sim">
														@component('formularios.Hidden',[
															'nome' 	=> 'compensado',
															'id'	=> 'compensado-cc',
															'valor'	=> 'Sim'
														])@endcomponent
														@component('formularios.Data',[
															'nome' 		=> 'data_lancamento',
															'id'		=> 'data_lancamento_compensar',
															'valor'		=> $lancamento->data_lancamento->format('Y-m-d'),
															'texto'		=> 'Data Compensado',
															'titulo'	=> 'Data Compensado',
															'tabindex'	=> '1'
														])@endcomponent
													</div>
													<div class="modal-footer">
														<button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
															<button class="btn btn-outline" type="submit" id="btn-compensar">Compensar</button>
													</div>
												</form>
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

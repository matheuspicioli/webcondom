@extends('adminlte::page')
@section('title', 'Lançamentos Contas corrente - Alterar')
@section('content_header')
    <h1>Lançamentos <small>de conta corrente</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.lancamentos.listar', ['conta_id' => $contaL->id, 'dias' => $dias]) }}"><i class="fa fa-group"></i> Contas corrente</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Alterar lançamento
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.lancamentos.listar', ['conta_id' => $contaL->id, 'dias' => $dias]) }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("exibir_lancamento")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Alterar lançamento</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('financeiros.lancamentos.alterar', ['id' => $lancamento->id, 'conta_id' => $contaL->id, 'dias' => $dias]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="conta_corrente_id" value="{{ $contaL->id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="data" class="control-label" @if($errors->has('data_lancamento')) style="color: #f56954" @endif>Data</label>
                                        <input id="data" type="date" class="form-control pula" @if($errors->has('data_lancamento')) style="color: #f56954" @endif
                                               name="data_lancamento" value="{{ $lancamento->data_lancamento->format('Y-m-d') }}">
                                    </div>
                                    @if( $errors->has('data_lancamento') )
                                        <span style="color: #f56954">{{ $errors->get('data_lancamento')[0] }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="documento" class="control-label" @if($errors->has('documento')) style="color: #f56954" @endif>Documento</label>
                                        <input id="documento" type="text" class="form-control pula" @if($errors->has('documento')) style="color: #f56954" @endif
                                               name="documento" value="{{  $lancamento->documento }}">
                                    </div>
                                    @if( $errors->has('documento') )
                                        <span style="color: #f56954">{{ $errors->get('documento')[0] }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" @if($errors->has('plano_conta_id')) style="color: #f56954" @endif>
                                        <label for="plano_conta_id" class="control-label">Plano de contas</label>
                                        <select name="plano_conta_id" id="plano_conta_id" class="form-control">
                                            <option selected disabled>SELECIONE</option>
                                            @foreach($tipos as $tipo)
                                                @foreach($tipo->grupos as $grupo)
                                                    @foreach($grupo->contas as $conta)
                                                        <option value="{{ $conta->id }}"
                                                            {{ $lancamento->plano_conta_id == $conta->id ? 'selected' : '' }}>
                                                            {{ "$tipo->tipo.$grupo->grupo.$conta->conta" }} - {{ $conta->descricao }}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @if( $errors->has('plano_conta_id') )
                                            <span class="help-block">{{ $errors->get('plano_conta_id')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- 2ª linha -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="historico" class="control-label" @if($errors->has('historico')) style="color: #f56954" @endif>Histórico</label>
                                        <input id="historico" type="text" class="form-control pula" @if($errors->has('historico')) style="color: #f56954" @endif
                                               name="historico" value="{{ $lancamento->historico }}">
                                    </div>
                                    @if( $errors->has('historico') )
                                        <span style="color: #f56954">{{ $errors->get('historico')[0] }}</span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="valor" class="control-label" @if($errors->has('valor')) style="color: #f56954" @endif>Valor</label>
                                        <input id="valor" type="text" class="form-control pula" @if($errors->has('valor')) style="color: #f56954" @endif
                                               name="valor" value="{{ $lancamento->valor }}">
                                    </div>
                                    @if( $errors->has('valor') )
                                        <span style="color: #f56954">{{ $errors->get('valor')[0] }}</span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" @if($errors->has('tipo')) style="color: #f56954" @endif>
                                        <div class="radio">
                                            <label><input type="radio" name="tipo"
                                                          value="Debito" {{ $lancamento->tipo == 'Debito' ? "checked" : '' }}>Débito</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="tipo"
                                                          value="Credito" {{ $lancamento->tipo == 'Credito' ? "checked" : '' }}>Crédito</label>
                                        </div>
                                    @if( $errors->has('tipo') )
                                        <span class="help-block">{{ $errors->get('tipo')[0] }}</span>
                                    @endif
                                    </div>
                                </div>
                                    <div class="col-md-2">
                                    <div class="checkbox">
                                        <label for="compensado">
                                            <input type="checkbox" class="flat-red" name="compensado"
                                                   id="compensado" {{ $lancamento->compensado == 'Sim' ? "checked" : '' }}> Compensado?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- 3ª linha -->
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group" @if($errors->has('fornecedor_id')) style="color: #f56954" @endif>
                                        <label for="fornecedor" class="control-label">Fornecedor</label>
                                        <select name="fornecedor_id" id="fornecedor" class="form-control">
                                            <option selected disabled>===============SELECIONE===============
                                            </option>
                                            @foreach($fornecedores as $fornecedor)
                                                <option value="{{ $fornecedor->id }}" {{ $lancamento->fornecedor_id == $fornecedor->id ? 'selected' : '' }}>
                                                    {{ $fornecedor->entidade->nome }}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->has('fornecedor_id') )
                                            <span style="color: #f56954">{{ $errors->get('fornecedor_id')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nota" class="control-label" @if($errors->has('nota_fiscal')) style="color: #f56954" @endif>Nota fiscal</label>
                                        <input id="nota" type="text" class="form-control pula" @if($errors->has('nota_fiscal')) style="color: #f56954" @endif
                                               name="nota_fiscal" value="{{ $lancamento->nota_fiscal }}">
                                        @if( $errors->has('nota_fiscal') )
                                            <span style="color: #f56954">{{ $errors->get('nota_fiscal')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parcela" class="control-label" @if($errors->has('parcela')) style="color: #f56954" @endif>Parcela</label>
                                        <input id="parcela" type="text" class="form-control pula" @if($errors->has('parcela')) style="color: #f56954" @endif
                                               name="parcela" value="{{ $lancamento->parcela }}">
                                        @if( $errors->has('parcela') )
                                            <span style="color: #f56954">{{ $errors->get('parcela')[0] }}</span>
                                        @endif
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
                                                    <input type="checkbox" name="cheque" id="cheque" {{ $lancamento->cheque == 'Sim' ? "checked" : '' }}>Cheque?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="enviado_em" class="control-label" @if($errors->has('enviado_em')) style="color: #f56954" @endif>Enviado em</label>
                                                <input type="date" name="enviado_em" id="enviado_em" @if($errors->has('enviado_em')) style="color: #f56954" @endif
                                                       class="form-control" value="{{ $lancamento->enviado_em }}">
                                                @if( $errors->has('enviado_em') )
                                                    <span style="color: #f56954">{{ $errors->get('enviado_em')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="retorno_em" class="control-label" @if($errors->has('retorno_em')) style="color: #f56954" @endif>Retorno em</label>
                                                <input type="date" name="retorno_em" id="retorno_em" @if($errors->has('retorno_em')) style="color: #f56954" @endif
                                                       class="form-control" value="{{ $lancamento->retorno_em }}">
                                                @if( $errors->has('retorno_em') )
                                                    <span style="color: #f56954">{{ $errors->get('retorno_em')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="checkbox">
                                                <label for="assinado">
                                                    <input type="checkbox" name="assinado" id="assinado" {{ $lancamento->assinado == 'Sim' ? "checked" : '' }}>Assinado?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_lancamento")
                                            <button class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Alterar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Alterar</button>
                                        @endcan
                                        @can("deletar_lancamento")
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                                <i class="fa fa-trash"></i> Excluir</button>
                                        @else
                                            <button disabled class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                                <i class="fa fa-trash"></i> Excluir</button>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-excluir" class="modal modal-danger fade">
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
        $(document).ready(function () {
            $('.select2').select2();
            $("#data").focus();
        });
    </script>
@stop
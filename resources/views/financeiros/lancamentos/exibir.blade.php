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
                                    <div class="form-group @if($errors->has('data_lancamento')) has-error @endif">
                                        @component('formularios.Data',[
                                            'nome' 			=> 'data_lancamento',
                                            'id'			=> 'data_lancamento',
                                            'valor'			=> old('data_lancamento') ?? $lancamento->data_lancamento->format('Y-m-d') ?? null,
                                            'tabindex'		=> '1',
                                            'texto'			=> 'Data',
                                            'titulo'        => 'Data do Lançamento'
                                        ])@endcomponent
                                        @if( $errors->has('data_lancamento') )
                                            <span style="color: #f56954">{{ $errors->get('data_lancamento')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('documento')) has-error @endif">
                                        @component('formularios.String',[
                                            'nome' 			=> 'documento',
                                            'id'			=> 'documento',
                                            'valor'			=> old('documento') ?? $lancamento->documento?? null,
                                            'tabindex'		=> '2',
                                            'texto'			=> 'Documento',
                                            'titulo'        => 'Número do Documento'
                                        ])@endcomponent
                                        @if( $errors->has('documento') )
                                            <span style="color: #f56954">{{ $errors->get('documento')[0] }}</span>
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
                                                        <option value="{{ $conta->id }}"
                                                            {{ $lancamento->plano_conta_id == $conta->id ? 'selected' : '' }}>
                                                            {{ "$tipo->tipo.$grupo->grupo.$conta->conta" }} - {{ $conta->descricao }}
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
                                            'valor'			=> old('historico') ?? $lancamento->historico ?? null,
                                            'texto'			=> 'Histórico',
                                            'tabindex'		=> '4',
                                            'titulo'        => 'Informe o Histórico'
                                        ])@endcomponent
                                        @if( $errors->has('historico') )
                                            <span style="color: #f56954">{{ $errors->get('historico')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group @if($errors->has('valor')) has-error @endif">
                                        @component('formularios.String',[
                                            'nome' 			=> 'valor',
                                            'id'			=> 'valor',
                                            'valor'			=> old('valor') ?? $lancamento->valor ?? null,
                                            'texto'			=> 'Valor',
                                            'tabindex'		=> '5',
                                            'titulo'        => 'Informe o Valor'
                                        ])@endcomponent
                                        @if( $errors->has('valor') )
                                            <span style="color: #f56954">{{ $errors->get('valor')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group @if($errors->has('tipo')) has-error @endif">
                                        @component('formularios.Radio',[
                                            'nome' 		=> 'tipo',
                                            'id'		=> 'tipo',
                                            'valor'		=> 'Debito',
                                            'campo'     => old('tipo') ?? $lancamento->tipo ?? '',
                                            'texto'		=> 'Débito',
                                            'atributos'	=> 'tabindex=6'
                                        ])@endcomponent
                                        @component('formularios.Radio',[
                                            'nome' 		=> 'tipo',
                                            'id'		=> 'tipo',
                                            'valor'		=> 'Credito',
                                            'campo'     => old('tipo') ?? $lancamento->tipo ?? '',
                                            'texto'		=> 'Crédito',
                                            'atributos'	=> 'tabindex=7'
                                        ])@endcomponent
                                        @if( $errors->has('tipo') )
                                            <span class="help-block">{{ $errors->get('tipo')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                    <div class="col-md-2">
                                        <div class="form-group @if($errors->has('assinado')) has-error @endif">
                                            @component('formularios.Checkbox',[
                                                'id'		=> 'compensado',
                                                'nome'		=> 'compensado',
                                                'valor'		=> 'Sim',
                                                'campo'     => old('compensado') ?? $lancamento->compensado ?? '',
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
                                                <option value="{{ $fornecedor->id }}" {{ $lancamento->fornecedor_id == $fornecedor->id ? 'selected' : '' }}>
                                                    {{ $fornecedor->entidade->nome }}</option>
                                            @endforeach
                                        @endcomponent
                                        @if( $errors->has('fornecedor_id') )
                                            <span style="color: #f56954">{{ $errors->get('fornecedor_id')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group @if($errors->has('nota_fiscal')) has-error @endif">
                                            @component('formularios.String',[
                                                'nome'		=> 'nota_fiscal',
                                                'id'		=> 'nota',
                                                'valor'		=> old('nota_fiscal') ?? $lancamento->nota_fiscal ?? null,
                                                'texto'		=> 'Nota fiscal',
                                                'tabindex'	=> '10',
                                                'titulo'    => 'Número da Nota Fiscal'
                                            ])@endcomponent
                                            @if( $errors->has('nota_fiscal') )
                                                <span style="color: #f56954">{{ $errors->get('nota_fiscal')[0] }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group @if($errors->has('parcela')) has-error @endif">
                                            @component('formularios.String',[
                                                'nome'		=> 'parcela',
                                                'id'		=> 'parcela',
                                                'valor'		=> old('parcela') ?? $lancamento->parcela ?? null,
                                                'texto'		=> 'Parcela',
                                                'tabindex'	=> '11',
                                                'titulo'    => 'Número da Parcela'
                                            ])@endcomponent
                                            @if( $errors->has('parcela') )
                                                <span style="color: #f56954">{{ $errors->get('parcela')[0] }}</span>
                                            @endif
                                        </div>
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
                                                    'campo'     => old('cheque') ?? $lancamento->cheque ?? '',
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
                                                    'valor'			=> old('enviado_em') ?? $lancamento->enviado_em ?? null,
                                                    'tabindex'		=> '13',
                                                    'texto'			=> 'Enviado em',
                                                    'titulo'        => 'Data de envio do malote'
                                                ])@endcomponent
                                                @if( $errors->has('enviado_em') )
                                                    <span style="color: #f56954">{{ $errors->get('enviado_em')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('retorno_em')) has-error @endif">
                                                @component('formularios.Data',[
                                                    'nome' 			=> 'retorno_em',
                                                    'id'			=> 'retorno_em',
                                                    'valor'			=> old('retorno_em') ?? $lancamento->retorno_em ?? null,
                                                    'tabindex'		=> '14',
                                                    'texto'			=> 'Retorno em',
                                                    'titulo'        => 'Data de retorno do malote'
                                                ])@endcomponent
                                                @if( $errors->has('retorno_em') )
                                                    <span style="color: #f56954">{{ $errors->get('retorno_em')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group @if($errors->has('assinado')) has-error @endif">
                                                @component('formularios.Checkbox',[
                                                    'id'		=> 'assinado',
                                                    'nome'		=> 'assinado',
                                                    'valor'		=> 'Sim',
                                                    'campo'     => old('assinado') ?? $lancamento->assinado ?? '',
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
                                    <div class="form-group">
                                        @can("editar_lancamento")
                                            @component('formularios.Botao',[
                                                'id'		=> 'salvar',
                                                'classes'	=> 'btn-info',
                                                'texto'		=> ' Alterar',
                                                'icone'     => 'fa fa-save',
                                                'titulo'    => 'Clique aqui para salvar',
                                                'atributos'	=> 'tabindex=16'
                                            ])@endcomponent
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Alterar</button>
                                        @endcan
                                        @can("deletar_lancamento")
                                                @component('formularios.Botao',[
                                                    'id'		=> 'excluir',
                                                    'classes'	=> 'btn-danger',
                                                    'texto'		=> ' Excluir',
                                                    'icone'     => 'fa fa-trash',
                                                    'titulo'    => 'Clique aqui para excluir',
                                                    'toogle'    => 'modal',
                                                    'target'    => '#modal-excluir',
                                                    'atributos'	=> 'tabindex=17'
                                                ])@endcomponent
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
@extends('adminlte::page')
@section('title', 'Contas corrente - Alterar')
@section('content_header')
    <h1>Alteração <small>de conta corrente</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.contascorrente.listar') }}"><i class="fa fa-group"></i> Contas corrente</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Alterar conta corrente
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.contascorrente.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("exibir_contacorrente")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Alterar conta corrente</h3>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('financeiros.contascorrente.alterar', ['id' => $conta->dados->id]) }}" method="POST" id="form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="condominio" class="control-label" class="control-label" @if($errors->has('condominio_id')) style="border:1px solid #f56954" @endif>Condomínio</label>
                                        <select name="condominio_id" id="condominio" class="form-control select2" @if($errors->has('condominio_id')) style="border:1px solid #f56954" @endif>
                                            @foreach($condominiosDados as $condominio)
                                                <option value="{{ $condominio->id }}" {{ old('condominio_id') == $condominio->id ? 'selected' : ($condominio->id == $conta->dados->condominio_id ? 'selected' : '') }}>
                                                    {{ $condominio->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if( $errors->has('condominio_id') )
                                            <span style="color: #f56954">{{ $errors->get('condominio_id')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codigo" class="control-label" @if($errors->has('codigo')) style="border:1px solid #f56954" @endif>Código</label>
                                        <input id="codigo" type="text" class="form-control pula" name="codigo" @if($errors->has('codigo')) style="border:1px solid #f56954" @endif
                                        data-mask="999999" value="{{ old('codigo') ? old('codigo') : $conta->dados->codigo }}">
                                        @if( $errors->has('codigo') )
                                            <span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="banco" class="control-label" @if($errors->has('banco_id')) style="border:1px solid #f56954" @endif>Banco</label>
                                        <select name="banco_id" class="form-control select2" id="banco" @if($errors->has('banco_id')) style="border:1px solid #f56954" @endif>
                                            @foreach($bancosDados as $banco)
                                                <option value="{{ $banco->id }}" {{ old('banco_id') == $banco->id ? 'selected' : ($banco->id == $conta->dados->banco_id ? 'selected' : '') }}>
                                                    {{ $banco->nome_banco }} - {{ $banco->CNAB}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if( $errors->has('banco_id') )
                                            <span style="color: #f56954">{{ $errors->get('banco_id')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="agencia" class="control-label" @if($errors->has('agencia')) style="border:1px solid #f56954" @endif>Agência</label>
                                        <input id="agencia" type="text" class="form-control pula" name="agencia" @if($errors->has('agencia')) style="border:1px solid #f56954" @endif
                                               value="{{ old('agencia') ? old('agencia') : $conta->dados->agencia }}">
                                        @if( $errors->has('agencia') )
                                            <span style="color: #f56954">{{ $errors->get('agencia')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="conta" class="control-label" @if($errors->has('conta')) style="border:1px solid #f56954" @endif>Conta</label>
                                        <input id="conta" type="text" class="form-control pula" name="conta" @if($errors->has('conta')) style="border:1px solid #f56954" @endif
                                               value="{{ old('conta') ? old('conta') : $conta->dados->conta }}">
                                        @if( $errors->has('conta') )
                                            <span style="color: #f56954">{{ $errors->get('conta')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="inicio" class="control-label" @if($errors->has('inicio')) style="border:1px solid #f56954" @endif>Inicio</label>
                                        <input id="inicio" type="date" class="form-control pula" name="inicio" @if($errors->has('inicio')) style="border:1px solid #f56954" @endif
                                               value="{{ old('inicio') ? old('inicio') : $conta->dados->inicio->format('Y-m-d') }}">
                                        @if( $errors->has('inicio') )
                                            <span style="color: #f56954">{{ $errors->get('inicio')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="checkbox">
                                        <label for="principal">
                                            <input type="checkbox" name="principal" id="principal"
                                                   {{ $conta->dados->principal ? "checked" : '' }} @if($errors->has('principal')) style="border:1px solid #f56954" @endif> Principal?
                                        </label>
                                        @if( $errors->has('principal') )
                                            <span style="color: #f56954">{{ $errors->get('principal')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Dados para boleto</h3>
                                        </div>

                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nome" class="control-label" @if($errors->has('nome')) style="border:1px solid #f56954" @endif>Nome</label>
                                                        <input id="nome" type="text" class="form-control pula" name="nome" @if($errors->has('nome')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('nome') ? old('nome') : $conta->dados->nome }}">
                                                        @if( $errors->has('nome') )
                                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="boleto_agencia" class="control-label" @if($errors->has('boleto_agencia')) style="border:1px solid #f56954" @endif>Agência</label>
                                                        <input id="boleto_agencia" type="text" class="form-control pula" name="boleto_agencia" @if($errors->has('boleto_agencia')) style="border:1px solid #f56954" @endif
                                                            value="{{ old('boleto_agencia') ? old('boleto_agencia') : $conta->dados->boleto_agencia }}">
                                                        @if( $errors->has('boleto_agencia') )
                                                            <span style="color: #f56954">{{ $errors->get('boleto_agencia')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="boleto_conta" class="control-label" @if($errors->has('boleto_conta')) style="border:1px solid #f56954" @endif>Conta</label>
                                                        <input id="boleto_conta" type="text" class="form-control pula" name="boleto_conta" @if($errors->has('boleto_conta')) style="border:1px solid #f56954" @endif
                                                            value="{{ old('boleto_conta') ? old('boleto_conta') : $conta->dados->boleto_conta }}">
                                                        @if( $errors->has('boleto_conta') )
                                                            <span style="color: #f56954">{{ $errors->get('boleto_conta')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cedente" class="control-label" @if($errors->has('cedente')) style="border:1px solid #f56954" @endif>Cedente</label>
                                                        <input id="cedente" type="text" class="form-control pula" name="cedente" @if($errors->has('cedente')) style="border:1px solid #f56954" @endif
                                                            value="{{ old('cendente') ? old('cedente') : $conta->dados->cedente }}">
                                                        @if( $errors->has('cedente') )
                                                            <span style="color: #f56954">{{ $errors->get('cedente')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="carteira" class="control-label" @if($errors->has('carteira')) style="border:1px solid #f56954" @endif>Carteira</label>
                                                        <input id="carteira" type="text" class="form-control pula" name="carteira" @if($errors->has('carteira')) style="border:1px solid #f56954" @endif
                                                            value="{{ old('carteira') ? old('carteira') : $conta->dados->carteira }}">
                                                        @if( $errors->has('carteira') )
                                                            <span style="color: #f56954">{{ $errors->get('carteira')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nosso_numero" class="control-label" @if($errors->has('nosso_numero')) style="border:1px solid #f56954" @endif>Nosso número</label>
                                                        <input id="nosso_numero" type="text" class="form-control pula" name="nosso_numero" @if($errors->has('nosso_numero')) style="border:1px solid #f56954" @endif
															   data-mask="{{ $conta->dados->banco->mascara_nossonumero }}"
                                                               value="{{ old('nosso_numero') ? old('nosso_numero') : $conta->dados->nosso_numero }}">
                                                        @if( $errors->has('nosso_numero') )
                                                            <span style="color: #f56954">{{ $errors->get('nosso_numero')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="prazo_baixa" class="control-label" @if($errors->has('prazo_baixa')) style="border:1px solid #f56954" @endif>Prazo para baixa</label>
                                                        <input id="prazo_baixa" type="number" class="form-control pula" name="prazo_baixa" @if($errors->has('prazo_baixa')) style="border:1px solid #f56954" @endif
                                                            value="{{ old('prazo_baixa') ? old('prazo_baixa') : $conta->dados->prazo_baixa }}">
                                                        @if( $errors->has('prazo_baixa') )
                                                            <span style="color: #f56954">{{ $errors->get('prazo_baixa')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="aceite" class="control-label" @if($errors->has('aceite')) style="border:1px solid #f56954" @endif>Aceite (S/N) </label>
                                                    <select name="aceite" id="aceite" class="form-control pula">
                                                        <option disabled selected>----------Selecione----------</option>
                                                        <option value="1" {{ old('aceite') == '1' ? 'selected' : ($conta->dados->aceite == '1' ? 'selected' : '') }}>Sim
                                                        </option>
                                                        <option value="0" {{ old('aceite') == '0' ? 'selected' : ($conta->dados->aceite == '0' ? 'selected' : '') }}>Não
                                                        </option>
                                                    </select>
                                                    @if( $errors->has('aceite') )
                                                        <span style="color: #f56954">{{ $errors->get('aceite')[0] }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="multa" class="control-label" @if($errors->has('multa')) style="border:1px solid #f56954" @endif>Multa (%)</label>
                                                        <input id="multa" type="text" class="form-control pula" name="juros" placeholder="0,00" @if($errors->has('multa')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('multa') ? old('multa') : $conta->dados->multa }}">
                                                        @if( $errors->has('multa') )
                                                            <span style="color: #f56954">{{ $errors->get('multa')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Juros" class="control-label" @if($errors->has('juros')) style="border:1px solid #f56954" @endif>Juros (%)</label>
                                                        <input id="Juros" type="text" class="form-control pula" name="juros" placeholder="0,00" @if($errors->has('juros')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('juros') ? old('juros') : $conta->dados->juros }}">
                                                        @if( $errors->has('juros') )
                                                            <span style="color: #f56954">{{ $errors->get('juros')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tipo_Juros" class="control-label" @if($errors->has('tipo_juros')) style="border:1px solid #f56954" @endif>Tipo de juros</label>
                                                        <select name="tipo_juros" id="tipo_juros" class="form-control pula">
                                                            <option disabled selected>----------Selecione----------</option>
                                                            <option value="AD" {{ old('tipo_juros') == 'AD' ? 'selected' : ($conta->dados->tipo_juros == 'AD' ? 'selected' : '') }}>Ao Dia
                                                            </option>
                                                            <option value="AM" {{ old('tipo_juros') == 'AM' ? 'selected' : ($conta->dados->tipo_juros == 'AM' ? 'selected' : '') }}>Ao Mês
                                                            </option>
                                                        </select>
                                                        @if( $errors->has('tipo_juros') )
                                                            <span style="color: #f56954">{{ $errors->get('tipo_juros')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="protestar" class="control-label" @if($errors->has('protestar')) style="border:1px solid #f56954" @endif>Protestar (S/N) </label>
                                                    <select name="protestar" id="protestar" class="form-control pula">
                                                        <option disabled selected>----------Selecione----------</option>
                                                        <option value="1" {{ old('protestar') == '1' ? 'selected' : ($conta->dados->protestar == '1' ? 'selected' : '') }}>Sim
                                                        </option>
                                                        <option value="0" {{ old('protestar') == '0' ? 'selected' : ($conta->dados->protestar == '0' ? 'selected' : '') }}>Não
                                                        </option>
                                                    </select>
                                                    @if( $errors->has('protestar') )
                                                        <span style="color: #f56954">{{ $errors->get('protestar')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-warning">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Mensagens do Boleto</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="mensagem1" class="control-label" @if($errors->has('mensagem1')) style="border:1px solid #f56954" @endif>Mensagem</label>
                                                        <input id="mensagem1" type="text" class="form-control pula" name="mensagem1" @if($errors->has('mensagem1')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('mensagem1') ? old('mensagem1') : $conta->dados->juros }}">
                                                        @if( $errors->has('mensagem1') )
                                                            <span style="color: #f56954">{{ $errors->get('mensagem1')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input id="mensagem2" type="text" class="form-control pula" name="mensagem2" @if($errors->has('mensagem2')) style="border:1px solid #f56954" @endif
                                                        value="{{ old('mensagem2') ? old('mensagem2') : $conta->dados->juros }}">
                                                        @if( $errors->has('mensagem1') )
                                                            <span style="color: #f56954">{{ $errors->get('mensagem2')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input id="mensagem3" type="text" class="form-control pula" name="mensagem3" @if($errors->has('mensagem3')) style="border:1px solid #f56954" @endif
                                                        value="{{ old('mensagem3') ? old('mensagem3') : $conta->dados->juros }}">
                                                        @if( $errors->has('mensagem3') )
                                                            <span style="color: #f56954">{{ $errors->get('mensagem3')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input id="mensagem4" type="text" class="form-control pula" name="mensagem4" @if($errors->has('mensagem4')) style="border:1px solid #f56954" @endif
                                                        value="{{ old('mensagem4') ? old('mensagem4') : $conta->dados->juros }}">
                                                        @if( $errors->has('mensagem4') )
                                                            <span style="color: #f56954">{{ $errors->get('mensagem4')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_contacorrente")
                                            <button class="btn btn-info" type="submit" id="salvar">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @endcan
                                        @can("deletar_contacorrente")
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
        <!-- MODAL EXCLUIR BANCO -->
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
                        <p>Conta:   {{ $conta->dados->conta }}</p>
                        <p>Agência: {{ $conta->dados->agencia }}</p>
                        <p>Banco:   {{ $conta->dados->banco ? $conta->dados->banco->nome_banco : 'Registro pai foi excluído.' }}</p>
                        <p>Nome : {{ $conta->dados->nome }}</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST" action="{{ route('financeiros.contascorrente.excluir', ['id' => $conta->dados->id]) }}">
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
            $("#condominio").focus();
        });
        $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#nosso_numero').unmask();
            $('#form').submit();
        });
    </script>
@stop
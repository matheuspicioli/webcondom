@extends('adminlte::page')
@section('title', 'Bancos - Editar')
@section('content_header')
    <h1>Bancos - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.bancos.listar') }}"><i class="fa fa-home"></i> Bancos</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Banco
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.bancos.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar Banco</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('financeiros.bancos.alterar', ['id' => $banco->id ]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="codigo_banco" class="control-label">Código do Banco</label>
                                    <input id="codigo_banco" type="text" class="form-control pula" name="codigo_banco"
                                           value="{{ $banco->codigo_banco }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nome_banco" class="control-label">Nome do Banco</label>
                                    <input id="nome_banco" type="text" class="form-control pula" name="nome_banco"
                                           value="{{ $banco->nome_banco }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="CNAB" class="control-label">CNAB</label>
                                    <select name="CNAB" id="CNAB" class="form-control pula">
                                        <option disabled selected>----------Selecione----------</option>
                                        <option value="240" {{ $banco->CNAB == '240' ? 'selected' : '' }}>240</option>
                                        <option value="400" {{ $banco->CNAB == '400' ? 'selected' : '' }}>400</option>
                                        <option value="640" {{ $banco->CNAB == '640' ? 'selected' : '' }}>640</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Dados para Boletos</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="carteira" class="control-label">Carteira</label>
                                                    <input type="text" id="carteira" name="carteira" class="form-control pula"
                                                           value="{{ $banco->carteira }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mascara_cedente" class="control-label">Máscara do Campo Cedente</label>
                                                    <input type="text" id="mascara_cedente" name="mascara_cedente" class="form-control pula"
                                                           value="{{ $banco->mascara_cedente }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mascara_nossonumero" class="control-label">Máscara do Campo Nosso Número</label>
                                                    <input type="text" id="mascara_nossonumero" name="mascara_nossonumero" class="form-control pula"
                                                           value="{{ $banco->mascara_nossonumero }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tamanho_agencia" class="control-label">Tamanho do Campo Agencia</label>
                                                    <input type="text" id="tamanho_agencia" name="tamanho_agencia" class="form-control pula"
                                                           value="{{ $banco->tamanho_agencia }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tamanho_conta" class="control-label">Tamanho do Campo Conta</label>
                                                    <input type="text" id="tamanho_conta" name="tamanho_conta" class="form-control pula"
                                                           value="{{ $banco->tamanho_conta }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tamanho_cedente" class="control-label">Tamanho do Campo Cendete</label>
                                                    <input type="text" id="tamanho_cedente" name="tamanho_cedente" class="form-control pula"
                                                           value="{{ $banco->tamanho_cedente }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tamanho_nossonumero" class="control-label">Tamanho do Campo Nosso Número</label>
                                                    <input type="text" id="tamanho_nossonúmero" name="tamanho_nossonumero" class="form-control pula"
                                                           value="{{ $banco->tamanho_nossonumero }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="local_pagamento" class="control-label">Local de Pagamento</label>
                                                    <input type="text" id="local_pagamento" name="local_pagamento" class="form-control pula"
                                                           value="{{ $banco->local_pagamento }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="mensagem" class="control-label">Mensagem</label>
                                                    <input type="text" id="mensagem" name="mensagem" class="form-control pula"
                                                           value="{{ $banco->mensagem }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-warning box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Configuração de Impressão de Cheques</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="linha_valor" class="control-label">Valor </label>
                                                    <input type="text" id="linha_valor" name="linha_valor" class="form-control pula"
                                                           value="{{ $banco->linha_valor }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="coluna_valor" class="control-label"></label>
                                                    <input type="text" id="coluna_valor" name="coluna_valor" class="form-control pula"
                                                           value="{{ $banco->coluna_valor }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="linha_extenso1" class="control-label">Extenso 1 </label>
                                                    <input type="text" id="linha_extenso1" name="linha_extenso1" class="form-control pula"
                                                           value="{{ $banco->linha_extenso1 }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="coluna_entenso1" class="control-label"></label>
                                                    <input type="text" id="coluna_extenso1" name="coluna_extenso1" class="form-control pula"
                                                           value="{{ $banco->coluna_extenso1 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="linha_extenso2" class="control-label">Extenso 2 </label>
                                                    <input type="text" id="linha_extenso2" name="linha_extenso2" class="form-control pula"
                                                           value="{{ $banco->linha_extenso2 }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="coluna_entenso2" class="control-label"></label>
                                                    <input type="text" id="coluna_extenso2" name="coluna_extenso2" class="form-control pula"
                                                           value="{{ $banco->coluna_extenso2 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="linha_nominal" class="control-label">Pago a </label>
                                                    <input type="text" id="linha_nominal" name="linha_nominal" class="form-control pula"
                                                           value="{{ $banco->linha_nominal }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="coluna_nominal" class="control-label"></label>
                                                    <input type="text" id="coluna_nominal" name="coluna_nominal" class="form-control pula"
                                                           value="{{ $banco->coluna_nominal }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="linha_dia" class="control-label">Dia </label>
                                                    <input type="text" id="linha_dia" name="linha_dia" class="form-control pula"
                                                           value="{{ $banco->linha_dia }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="coluna_dia" class="control-label"></label>
                                                    <input type="text" id="coluna_dia" name="coluna_dia" class="form-control pula"
                                                           value="{{ $banco->coluna_dia}}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="linha_mes" class="control-label">Mes </label>
                                                    <input type="text" id="linha_mes" name="linha_mes" class="form-control pula"
                                                           value="{{ $banco->linha_mes }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="coluna_mes" class="control-label"></label>
                                                    <input type="text" id="coluna_mes" name="coluna_mes" class="form-control pula"
                                                           value="{{ $banco->coluna_mes }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="linha_ano" class="control-label">Ano </label>
                                                    <input type="text" id="linha_ano" name="linha_ano" class="form-control pula"
                                                           value="{{ $banco->linha_ano }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="coluna_ano" class="control-label"></label>
                                                    <input type="text" id="coluna_ano" name="coluna_ano" class="form-control pula"
                                                           value="{{ $banco->coluna_ano }}">
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
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-save"></i> Salvar</button>
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
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
                    <h4>Deseja realmente excluir o banco "{{ $banco->nome_banco }}" e padrão "{{ $banco->CNAB }}"?</h4>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST" action="{{ route('financeiros.bancos.excluir', ['id' => $banco->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#codigo_banco').focus();
        });
    </script>
@endsection

@extends('adminlte::page')
@section('title', 'Bancos - Cadastrar')
@section('content_header')
    <h1>Cadastro - <small>de Bancos</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.bancos.listar') }}"><i class="fa fa-home"></i> Bancos</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Cadastrar Banco
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
    @can("incluir_banco")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar Banco</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('financeiros.bancos.salvar') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codigo_banco" class="control-label">Código do Banco</label>
                                        <input id="codigo_banco" type="text" class="form-control pula" name="codigo_banco" >
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nome_banco" class="control-label">Nome do Banco</label>
                                        <input id="nome_banco" type="text" class="form-control pula" name="nome_banco" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="CNAB" class="control-label">CNAB</label>
                                        <select name="CNAB" id="CNAB" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="240">240</option>
                                            <option value="400">400</option>
                                            <option value="640">640</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <label for="foto" class="control-label"
                                           @if($errors->has('foto')) style="color: #f56954" @endif>Foto</label>
                                    <input type="file" name="foto" id="foto"
                                           @if($errors->has('foto')) style="border:1px solid #f56954" @endif
                                           value="{{ old('foto') ? old('foto') : '' }}">
                                    @if( $errors->has('foto') )
                                        <span style="color: #f56954">{{ $errors->get('foto')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row"> &nbsp; </div>
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
                                                        <input type="text" id="carteira" name="carteira" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="mascara_cedente" class="control-label">Máscara do Campo Cedente</label>
                                                        <input type="text" id="mascara_cedente" name="mascara_cedente" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="mascara_nossonumero" class="control-label">Máscara do Campo Nosso Número</label>
                                                        <input type="text" id="mascara_nossonumero" name="mascara_nossonumero" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_agencia" class="control-label">Tamanho do Campo Agencia</label>
                                                        <input type="text" id="tamanho_agencia" name="tamanho_agencia" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_conta" class="control-label">Tamanho do Campo Conta</label>
                                                        <input type="text" id="tamanho_conta" name="tamanho_conta" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_cedente" class="control-label">Tamanho do Campo Cendete</label>
                                                        <input type="text" id="tamanho_cedente" name="tamanho_cedente" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_nossonumero" class="control-label">Tamanho do Campo Nosso Número</label>
                                                        <input type="text" id="tamanho_nossonumero" name="tamanho_nossonumero" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="local_pagamento" class="control-label">Local de Pagamento</label>
                                                        <input type="text" id="local_pagamento" name="local_pagamento" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="mensagem" class="control-label">Mensagem</label>
                                                        <input type="text" id="mensagem" name="mensagem" class="form-control pula" >
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_valor" class="control-label">Valor </label>
                                                        <input type="text" id="linha_valor" name="linha_valor" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_valor" class="control-label">Coluna valor</label>
                                                        <input type="text" id="coluna_valor" name="coluna_valor" class="form-control pula" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_extenso1" class="control-label">Extenso 1 </label>
                                                        <input type="text" id="linha_extenso1" name="linha_extenso1" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_entenso1" class="control-label">Coluna ex 1</label>
                                                        <input type="text" id="coluna_extenso1" name="coluna_extenso1" class="form-control pula" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_extenso2" class="control-label">Extenso 2 </label>
                                                        <input type="text" id="linha_extenso2" name="linha_extenso2" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_entenso2" class="control-label">Coluna ex 2</label>
                                                        <input type="text" id="coluna_extenso2" name="coluna_extenso2" class="form-control pula" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_nominal" class="control-label">Pago a </label>
                                                        <input type="text" id="linha_nominal" name="linha_nominal" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_nominal" class="control-label">Coluna nominal</label>
                                                        <input type="text" id="coluna_nominal" name="coluna_nominal" class="form-control pula" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_dia" class="control-label">Dia </label>
                                                        <input type="text" id="linha_dia" name="linha_dia" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_dia" class="control-label">Coluna dia</label>
                                                        <input type="text" id="coluna_dia" name="coluna_dia" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_mes" class="control-label">Mes </label>
                                                        <input type="text" id="linha_mes" name="linha_mes" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_mes" class="control-label">Coluna mês</label>
                                                        <input type="text" id="coluna_mes" name="coluna_mes" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_ano" class="control-label">Ano </label>
                                                        <input type="text" id="linha_ano" name="linha_ano" class="form-control pula" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_ano" class="control-label">Coluna ano</label>
                                                        <input type="text" id="coluna_ano" name="coluna_ano" class="form-control pula" >
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
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i> Cadastrar</button>
                                    </div>
                                </div>
                            </div>
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
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#codigo_banco').focus();
        });
    </script>
@endsection
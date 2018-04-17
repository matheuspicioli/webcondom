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
                                        <label for="codigo_banco" class="control-label" @if($errors->has('codigo_banco')) style="color: #f56954" @endif>Código do banco</label>
                                        <input type="text" id="codigo_banco" name="codigo_banco" class="form-control pula" @if($errors->has('codigo_banco')) style="border:1px solid #f56954" @endif
                                            value="{{ old('codigo_banco') ? old('codigo_banco') : '' }}">
                                        @if( $errors->has('codigo_banco') )
                                            <span style="color: #f56954">{{ $errors->get('codigo_banco')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nome_banco" class="control-label" @if($errors->has('nome_banco')) style="color: #f56954" @endif>Nome do banco</label>
                                        <input type="text" id="nome_banco" name="nome_banco" class="form-control pula" @if($errors->has('nome_banco')) style="border:1px solid #f56954" @endif
                                            value="{{ old('nome_banco') ? old('nome_banco') : '' }}">
                                        @if( $errors->has('nome_banco') )
                                            <span style="color: #f56954">{{ $errors->get('nome_banco')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="CNAB" class="control-label" @if($errors->has('CNAB')) style="color: #f56954" @endif>CNAB</label>
                                        <select name="CNAB" id="CNAB" class="form-control pula" @if($errors->has('CNAB')) style="border:1px solid #f56954" @endif>
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="240" {{ old('CNAB') == '240' ? 'selected' : '' }}>240</option>
                                            <option value="400" {{ old('CNAB') == '400' ? 'selected' : '' }}>400</option>
                                            <option value="640" {{ old('CNAB') == '640' ? 'selected' : '' }}>640</option>
                                        </select>
                                        @if( $errors->has('CNAB') )
                                            <span style="color: #f56954">{{ $errors->get('CNAB')[0] }}</span>
                                        @endif
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
                                                        <label for="carteira" class="control-label" @if($errors->has('carteira')) style="color: #f56954" @endif>Carteira</label>
                                                        <input type="text" id="carteira" name="carteira" class="form-control pula"
                                                               @if($errors->has('carteira')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('carteira') ? old('carteira') : '' }}">
                                                        @if( $errors->has('carteira') )
                                                            <span style="color: #f56954">{{ $errors->get('carteira')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="mascara_cedente" class="control-label" @if($errors->has('mascara_cedente')) style="color: #f56954" @endif>
                                                            Máscara do Campo Cedente</label>
                                                        <input type="text" id="mascara_cedente" name="mascara_cedente" class="form-control pula"
                                                               @if($errors->has('mascara_cedente')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('mascara_cedente') ? old('mascara_cedente') : '' }}">
                                                        @if( $errors->has('mascara_cedente') )
                                                            <span style="color: #f56954">{{ $errors->get('mascara_cedente')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="mascara_nossonumero" class="control-label" @if($errors->has('mascara_nossonumero')) style="color: #f56954" @endif>
                                                            Máscara do Campo Nosso Número</label>
                                                        <input type="text" id="mascara_nossonumero" name="mascara_nossonumero" class="form-control pula"
                                                               @if($errors->has('mascara_nossonumero')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('mascara_nossonumero') ? old('mascara_nossonumero') : '' }}">
                                                        @if( $errors->has('mascara_nossonumero') )
                                                            <span style="color: #f56954">{{ $errors->get('mascara_nossonumero')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_agencia" class="control-label" @if($errors->has('tamanho_agencia')) style="color: #f56954" @endif>
                                                            Tamanho do Campo Agencia</label>
                                                        <input type="text" id="tamanho_agencia" name="tamanho_agencia" class="form-control pula"
                                                               @if($errors->has('tamanho_agencia')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('tamanho_agencia') ? old('tamanho_agencia') : '' }}">
                                                        @if( $errors->has('tamanho_agencia') )
                                                            <span style="color: #f56954">{{ $errors->get('tamanho_agencia')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_conta" class="control-label" @if($errors->has('tamanho_conta')) style="color: #f56954" @endif>
                                                            Tamanho do Campo Conta</label>
                                                        <input type="text" id="tamanho_conta" name="tamanho_conta" class="form-control pula"
                                                               @if($errors->has('tamanho_conta')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('tamanho_conta') ? old('tamanho_conta') : '' }}">
                                                        @if( $errors->has('tamanho_conta') )
                                                            <span style="color: #f56954">{{ $errors->get('tamanho_conta')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_cedente" class="control-label" @if($errors->has('tamanho_cedente')) style="color: #f56954" @endif>
                                                            Tamanho do Campo Cendete</label>
                                                        <input type="text" id="tamanho_cedente" name="tamanho_cedente" class="form-control pula"
                                                               @if($errors->has('tamanho_cedente')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('tamanho_cedente') ? old('tamanho_cedente') : '' }}">
                                                        @if( $errors->has('tamanho_cedente') )
                                                            <span style="color: #f56954">{{ $errors->get('tamanho_cedente')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="tamanho_nossonumero" class="control-label" @if($errors->has('tamanho_nossonumero')) style="color: #f56954" @endif>
                                                            Tamanho do Campo Nosso Número</label>
                                                        <input type="text" id="tamanho_nossonumero" name="tamanho_nossonumero" class="form-control pula"
                                                               @if($errors->has('tamanho_nossonumero')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('tamanho_nossonumero') ? old('tamanho_nossonumero') : '' }}">
                                                        @if( $errors->has('tamanho_nossonumero') )
                                                            <span style="color: #f56954">{{ $errors->get('tamanho_nossonumero')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="local_pagamento" class="control-label" @if($errors->has('local_pagamento')) style="color: #f56954" @endif>
                                                            Local de Pagamento</label>
                                                        <input type="text" id="local_pagamento" name="local_pagamento" class="form-control pula"
                                                               @if($errors->has('local_pagamento')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('local_pagamento') ? old('local_pagamento') : '' }}">
                                                        @if( $errors->has('local_pagamento') )
                                                            <span style="color: #f56954">{{ $errors->get('local_pagamento')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="mensagem" class="control-label" @if($errors->has('mensagem')) style="color: #f56954" @endif>
                                                            Mensagem</label>
                                                        <input type="text" id="mensagem" name="mensagem" class="form-control pula"
                                                               @if($errors->has('mensagem')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('mensagem') ? old('mensagem') : '' }}">
                                                        @if( $errors->has('mensagem') )
                                                            <span style="color: #f56954">{{ $errors->get('mensagem')[0] }}</span>
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
                                    <div class="box box-warning box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Configuração de Impressão de Cheques</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_valor" class="control-label" @if($errors->has('linha_valor')) style="color: #f56954" @endif>
                                                            Valor</label>
                                                        <input type="text" id="linha_valor" name="linha_valor" class="form-control pula"
                                                               @if($errors->has('linha_valor')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('linha_valor') ? old('linha_valor') : '' }}">
                                                        @if( $errors->has('linha_valor') )
                                                            <span style="color: #f56954">{{ $errors->get('linha_valor')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_valor" class="control-label" @if($errors->has('coluna_valor')) style="color: #f56954" @endif>
                                                            Coluna valor</label>
                                                        <input type="text" id="coluna_valor" name="coluna_valor" class="form-control pula"
                                                               @if($errors->has('coluna_valor')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('coluna_valor') ? old('coluna_valor') : '' }}">
                                                        @if( $errors->has('coluna_valor') )
                                                            <span style="color: #f56954">{{ $errors->get('coluna_valor')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_extenso1" class="control-label" @if($errors->has('linha_extenso1')) style="color: #f56954" @endif>
                                                            Extenso 1</label>
                                                        <input type="text" id="linha_extenso1" name="linha_extenso1" class="form-control pula"
                                                               @if($errors->has('linha_extenso1')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('linha_extenso1') ? old('linha_extenso1') : '' }}">
                                                        @if( $errors->has('linha_extenso1') )
                                                            <span style="color: #f56954">{{ $errors->get('linha_extenso1')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_extenso1" class="control-label" @if($errors->has('coluna_extenso1')) style="color: #f56954" @endif>
                                                            Coluna Coluna v 1</label>
                                                        <input type="text" id="coluna_extenso1" name="coluna_extenso1" class="form-control pula"
                                                               @if($errors->has('coluna_extenso1')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('coluna_extenso1') ? old('coluna_extenso1') : '' }}">
                                                        @if( $errors->has('coluna_extenso1') )
                                                            <span style="color: #f56954">{{ $errors->get('coluna_extenso1')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_extenso2" class="control-label" @if($errors->has('linha_extenso2')) style="color: #f56954" @endif>
                                                            Extenso 2</label>
                                                        <input type="text" id="linha_extenso2" name="linha_extenso2" class="form-control pula"
                                                               @if($errors->has('linha_extenso2')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('linha_extenso2') ? old('linha_extenso2') : '' }}">
                                                        @if( $errors->has('linha_extenso2') )
                                                            <span style="color: #f56954">{{ $errors->get('linha_extenso2')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_extenso2" class="control-label" @if($errors->has('coluna_extenso2')) style="color: #f56954" @endif>
                                                            Coluna ex 2</label>
                                                        <input type="text" id="coluna_extenso2" name="coluna_extenso2" class="form-control pula"
                                                               @if($errors->has('coluna_extenso2')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('coluna_extenso2') ? old('coluna_extenso2') : '' }}">
                                                        @if( $errors->has('coluna_extenso2') )
                                                            <span style="color: #f56954">{{ $errors->get('coluna_extenso2')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_nominal" class="control-label" @if($errors->has('linha_nominal')) style="color: #f56954" @endif>
                                                            Pago a</label>
                                                        <input type="text" id="linha_nominal" name="linha_nominal" class="form-control pula"
                                                               @if($errors->has('linha_nominal')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('linha_nominal') ? old('linha_nominal') : '' }}">
                                                        @if( $errors->has('linha_nominal') )
                                                            <span style="color: #f56954">{{ $errors->get('linha_nominal')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_nominal" class="control-label" @if($errors->has('coluna_nominal')) style="color: #f56954" @endif>
                                                            Coluna nominal</label>
                                                        <input type="text" id="coluna_nominal" name="coluna_nominal" class="form-control pula"
                                                               @if($errors->has('coluna_nominal')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('coluna_nominal') ? old('coluna_nominal') : '' }}">
                                                        @if( $errors->has('coluna_nominal') )
                                                            <span style="color: #f56954">{{ $errors->get('coluna_nominal')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_dia" class="control-label" @if($errors->has('linha_dia')) style="color: #f56954" @endif>
                                                            Dia</label>
                                                        <input type="text" id="linha_dia" name="linha_dia" class="form-control pula"
                                                               @if($errors->has('linha_dia')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('linha_dia') ? old('linha_dia') : '' }}">
                                                        @if( $errors->has('linha_dia') )
                                                            <span style="color: #f56954">{{ $errors->get('linha_dia')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_dia" class="control-label" @if($errors->has('coluna_dia')) style="color: #f56954" @endif>
                                                            Coluna dia</label>
                                                        <input type="text" id="coluna_dia" name="coluna_dia" class="form-control pula"
                                                               @if($errors->has('coluna_dia')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('coluna_dia') ? old('coluna_dia') : '' }}">
                                                        @if( $errors->has('coluna_dia') )
                                                            <span style="color: #f56954">{{ $errors->get('coluna_dia')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_mes" class="control-label" @if($errors->has('linha_mes')) style="color: #f56954" @endif>
                                                            Mês</label>
                                                        <input type="text" id="linha_mes" name="linha_mes" class="form-control pula"
                                                               @if($errors->has('linha_mes')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('linha_mes') ? old('linha_mes') : '' }}">
                                                        @if( $errors->has('linha_mes') )
                                                            <span style="color: #f56954">{{ $errors->get('linha_mes')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_mes" class="control-label" @if($errors->has('coluna_mes')) style="color: #f56954" @endif>
                                                            Coluna mês</label>
                                                        <input type="text" id="coluna_mes" name="coluna_mes" class="form-control pula"
                                                               @if($errors->has('coluna_mes')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('coluna_mes') ? old('coluna_mes') : '' }}">
                                                        @if( $errors->has('coluna_mes') )
                                                            <span style="color: #f56954">{{ $errors->get('coluna_mes')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="linha_ano" class="control-label" @if($errors->has('linha_ano')) style="color: #f56954" @endif>
                                                            Ano</label>
                                                        <input type="text" id="linha_ano" name="linha_ano" class="form-control pula"
                                                               @if($errors->has('linha_ano')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('linha_ano') ? old('linha_ano') : '' }}">
                                                        @if( $errors->has('linha_ano') )
                                                            <span style="color: #f56954">{{ $errors->get('linha_ano')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="coluna_ano" class="control-label" @if($errors->has('coluna_ano')) style="color: #f56954" @endif>
                                                            Coluna ano</label>
                                                        <input type="text" id="coluna_ano" name="coluna_ano" class="form-control pula"
                                                               @if($errors->has('coluna_ano')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('coluna_ano') ? old('coluna_ano') : '' }}">
                                                        @if( $errors->has('coluna_ano') )
                                                            <span style="color: #f56954">{{ $errors->get('coluna_ano')[0] }}</span>
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
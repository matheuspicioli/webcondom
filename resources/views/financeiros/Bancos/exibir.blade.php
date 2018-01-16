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
                                    <label for="codigoBanco" class="control-label">Código do Banco</label>
                                    <input id="codigoBanco" type="text" class="form-control pula" name="codigoBanco"
                                           value="{{ $banco->codigoBanco }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nomeBanco" class="control-label">Nome do Banco</label>
                                    <input id="nomeBanco" type="text" class="form-control pula" name="nomeBanco"
                                           value="{{ $banco->nomeBanco }}">
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
                                                    <label for="tamAgencia" class="control-label">Tamanho do Campo Agencia</label>
                                                    <input type="text" id="tamAgencia" name="tamAgencia" class="form-control pula"
                                                           value="{{ $banco->tamAgencia }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tamConta" class="control-label">Tamanho do Campo Conta</label>
                                                    <input type="text" id="tamConta" name="tamConta" class="form-control pula"
                                                           value="{{ $banco->tamConta }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tamCedente" class="control-label">Tamanho do Campo Cendete</label>
                                                    <input type="text" id="tamCedente" name="tamCedente" class="form-control pula"
                                                           value="{{ $banco->tamCedente }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tamNossoNumero" class="control-label">Tamanho do Campo Nosso Número</label>
                                                    <input type="text" id="tamNossoNúmero" name="tamNossoNumero" class="form-control pula"
                                                           value="{{ $banco->tamNossoNumero }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="localPagamento" class="control-label">Local de Pagamento</label>
                                                    <input type="text" id="localPagamento" name="localPagamento" class="form-control pula"
                                                           value="{{ $banco->localPagamento }}">
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
                                                    <label for="l_valor" class="control-label">Valor </label>
                                                    <input type="text" id="l_valor" name="l_valor" class="form-control pula"
                                                           value="{{ $banco->l_valor }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="c_valor" class="control-label"></label>
                                                    <input type="text" id="c_valor" name="c_valor" class="form-control pula"
                                                           value="{{ $banco->c_valor }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="l_extenso1" class="control-label">Extenso 1 </label>
                                                    <input type="text" id="l_extenso1" name="l_extenso1" class="form-control pula"
                                                           value="{{ $banco->l_extenso1 }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="c_entenso1" class="control-label"></label>
                                                    <input type="text" id="c_extenso1" name="c_extenso1" class="form-control pula"
                                                           value="{{ $banco->c_extenso1 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="l_extenso2" class="control-label">Extenso 2 </label>
                                                    <input type="text" id="l_extenso2" name="l_extenso2" class="form-control pula"
                                                           value="{{ $banco->l_extenso2 }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="c_entenso2" class="control-label"></label>
                                                    <input type="text" id="c_extenso2" name="c_extenso2" class="form-control pula"
                                                           value="{{ $banco->c_extenso2 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="l_nominal" class="control-label">Pago a </label>
                                                    <input type="text" id="l_nominal" name="l_nominal" class="form-control pula"
                                                           value="{{ $banco->l_nominal }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="c_nominal" class="control-label"></label>
                                                    <input type="text" id="c_nominal" name="c_nominal" class="form-control pula"
                                                           value="{{ $banco->c_nominal }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="l_dia" class="control-label">Dia </label>
                                                    <input type="text" id="l_dia" name="l_dia" class="form-control pula"
                                                           value="{{ $banco->l_dia }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="c_dia" class="control-label"></label>
                                                    <input type="text" id="c_dia" name="c_dia" class="form-control pula"
                                                           value="{{ $banco->c_dia}}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="l_mes" class="control-label">Mes </label>
                                                    <input type="text" id="l_mes" name="l_mes" class="form-control pula"
                                                           value="{{ $banco->l_mes }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="c_mes" class="control-label"></label>
                                                    <input type="text" id="c_mes" name="c_mes" class="form-control pula"
                                                           value="{{ $banco->c_mes }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="l_ano" class="control-label">Ano </label>
                                                    <input type="text" id="l_ano" name="l_ano" class="form-control pula"
                                                           value="{{ $banco->l_ano }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="c_ano" class="control-label"></label>
                                                    <input type="text" id="c_ano" name="c_ano" class="form-control pula"
                                                           value="{{ $banco->c_ano }}">
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
                    <h4>Deseja realmente excluir o banco "{{ $banco->nomeBanco }}" e padrão "{{ $banco->CNAB }}"?</h4>
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
            $('#codigoBanco').focus();
        });
    </script>
@endsection

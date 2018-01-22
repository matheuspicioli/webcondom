@extends('adminlte::page')
@section('title', 'Contas corrente - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de conta corrente</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.contascorrente.listar') }}"><i class="fa fa-group"></i> Contas corrente</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar conta corrente
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
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar conta corrente</h3>
                </div>

                <div class="box-body">
                    <form action="{{ route('financeiros.contascorrente.salvar') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="condominio" class="control-label"></label>
                                    <select name="condominio_id" id="condominio" class="form-control">
                                        @foreach($condominiosDados as $condominio)
                                            <option value="{{ $condominio->id }}">{{ $condominio->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="banco" class="control-label">Banco</label>
                                    <select name="banco_id" class="form-control select2" id="banco">
                                        @foreach($bancosDados as $banco)
                                            <option value="{{ $banco->id }}">{{ $banco->nome_banco }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="agencia" class="control-label">Agência</label>
                                    <input id="agencia" type="text" class="form-control pula" name="agencia">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="conta" class="control-label">Conta</label>
                                    <input id="conta" type="text" class="form-control pula" name="conta">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="inicio" class="control-label">Inicio</label>
                                    <input id="inicio" type="date" class="form-control pula" name="inicio">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="checkbox">
                                    <label for="principal">
                                        <input type="checkbox" name="principal" id="principal"> Principal?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-warning">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Dados para boleto</h3>
                                    </div>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nome" class="control-label">Nome</label>
                                                    <input id="nome" type="text" class="form-control pula" name="nome">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="boleto_agencia" class="control-label">Agência</label>
                                                    <input id="boleto_agencia" type="text" class="form-control pula" name="boleto_agencia">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="boleto_conta" class="control-label">Conta</label>
                                                    <input id="boleto_conta" type="text" class="form-control pula" name="boleto_conta">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="cedente" class="control-label">Cedente</label>
                                                    <input id="cedente" type="text" class="form-control pula" name="cedente">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="carteira" class="control-label">Carteira</label>
                                                    <input id="carteira" type="text" class="form-control pula" name="carteira">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="nosso_numero" class="control-label">Nosso número</label>
                                                    <input id="nosso_numero" type="text" class="form-control pula" name="nosso_numero">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="prazo_baixa" class="control-label">Prazo para baixa</label>
                                                    <input id="prazo_baixa" type="number" class="form-control pula" name="prazo_baixa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <label for="aceita">
                                                        <input type="checkbox" id="aceita" name="aceita"> Aceitar recebimento após vencimento?
                                                    </label>
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
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $("#condominio").focus();
        });
    </script>
@stop
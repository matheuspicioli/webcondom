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
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados da conta corrente</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="condominio" class="control-label">Condomínio</label>
                                <input id="condominio" type="text" class="form-control pula" name="condominio"
                                       disabled="disabled" value="{{ $condominio->nome }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="codigo" class="control-label">Código</label>
                                <input id="codigo" type="text" class="form-control pula" name="codigo"
                                       disabled="disabled" value="{{ $conta->codigo }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banco" class="control-label">Banco</label>
                                <input id="banco" type="text" class="form-control pula" name="banco"
                                       disabled="disabled" value="{{ $conta->banco->nome_banco }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="agencia" class="control-label">Agência</label>
                                <input id="agencia" type="text" class="form-control pula" name="agencia"
                                       disabled="disabled" value="{{ $conta->agencia }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="conta" class="control-label">Conta</label>
                                <input id="conta" type="text" class="form-control pula" name="conta"
                                       disabled="disabled" value="{{ $conta->conta }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="inicio" class="control-label">Início</label>
                                <input id="inicio" type="date" class="form-control pula" name="inicio"
                                       disabled="disabled" value="{{ $conta->inicio->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label for="principal">
                                    <input type="checkbox" disabled="disabled" name="principal" id="principal" {{ $conta->principal ? "checked" : '' }}> Principal?
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
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nota" class="control-label">Nota fiscal</label>
                                                    <input id="nota" type="text" class="form-control pula" name="nota_fiscal">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="parcela" class="control-label">Parcela</label>
                                                    <input id="parcela" type="text" class="form-control pula" name="parcela">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="documento" class="control-label">Documento</label>
                                                    <input id="documento" type="text" class="form-control pula" name="documento">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label><input type="radio" name="tipo" value="Debito">Débito</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="tipo" value="Credito">Crédito</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="valor" class="control-label">Valor</label>
                                                    <input id="valor" type="number" class="form-control pula" name="valor">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="checkbox">
                                                    <label for="compensado">
                                                        <input type="checkbox" name="compensado" id="compensado"> Compensado?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="checkbox">
                                                    <label for="cheque">
                                                        <input type="checkbox" name="cheque" id="cheque"> Cheque?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="enviado_em" class="control-label">Enviado em</label>
                                                    <input type="date" name="enviado_em" id="enviado_em" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="retorno_em" class="control-label">Retorno em</label>
                                                    <input type="date" name="retorno_em" id="retorno_em" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="checkbox">
                                                    <label for="assinado">
                                                        <input type="checkbox" name="assinado" id="assinado"> Assinado?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="fornecedor" class="control-label">Fornecedor</label>
                                                <select name="fornecedor_id" id="fornecedor" class="form-control select2">
                                                    <option selected disabled>===============SELECIONE===============</option>
                                                    @foreach($fornecedores as $fornecedor)
                                                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->entidade->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="conta_corrente" class="control-label">Conta corrente</label>
                                                <select name="conta_corrente_id" id="conta_corrente" class="form-control select2">
                                                    <option selected disabled>===============SELECIONE===============</option>
                                                    @foreach($contas as $contaSelect)
                                                        <option value="{{ $contaSelect->id }}" {{ $contaSelect->id == $conta->id ? 'selected' : '' }}>
                                                            {{ $contaSelect->agencia }} - {{ $contaSelect->conta }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="tipo_conta" class="control-label">Tipo conta</label>
                                                <select name="tipo_conta_id" id="tipo_conta" class="form-control select2">
                                                    <option selected disabled>SELECIONE</option>
                                                    @foreach($tipos as $tipo)
                                                        <option value="{{ $tipo->id }}">
                                                            {{ $tipo->descricao }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                        <a href="{{ route('financeiros.lancamentos.listar',['conta_id' => $conta->id, 'dias' => 7]) }}" class="btn btn-primary btn-xs">
                            Últimos 7 dias
                        </a>
                        <a href="{{ route('financeiros.lancamentos.listar',['conta_id' => $conta->id, 'dias' => 15]) }}" class="btn btn-primary btn-xs">
                            Últimos 15 dias
                        </a>
                        <a href="{{ route('financeiros.lancamentos.listar',['conta_id' => $conta->id, 'dias' => 30]) }}" class="btn btn-primary btn-xs">
                            Últimos 30 dias
                        </a>
                        <a class="btn btn-xs btn-success"
                           href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'xlsx']) }}">
                            <i class="fa fa-file-excel-o"></i>
                        </a>
                        <a class="btn btn-xs btn-success"
                           href="{{ route('financeiros.planodecontas.exportar', ['tipo' => 'csv']) }}">
                            CSV
                        </a>
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>Descrição grupo</th>
                            <th>Descrição conta</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Grupo</th>
                            <th>Conta</th>
                            <th>Criado em</th>
                            <th>Alterado em</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Descrição grupo</th>
                            <th>Descrição conta</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Grupo</th>
                            <th>Conta</th>
                            <th>Criado em</th>
                            <th>Alterado em</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>

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
    <script>
        $(document).ready(function () {
            $('#tabela').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            });
            $('.select2').select2();
            $('#nota').focus();
        });
    </script>
@stop
@extends('adminlte::page')
@section('title', 'Plano de contas - Editar')
@section('content_header')
    <h1>Plano de contas -
        <small>edição</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.planodecontas.listar') }}"><i class="fa fa-home"></i> Plano de contas</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Plano de contas
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.planodecontas.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Plano de contas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form method="POST"
                          action="{{ route('financeiros.planodecontas.alterar', ['id' => $plano->dados->id ]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="descricao" class="control-label">Descrição</label>
                                    <input id="descricao" type="text" class="form-control pula" name="descricao"
                                           value="{{ $plano->dados->descricao }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="classificacao" class="control-label">Classificação</label>
                                    <input id="classificacao" type="text" class="form-control pula" name="classificacao"
                                           value="{{ $plano->dados->classificacao }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="tipo" class="control-label">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control select2">
                                        <option value="Receita" {{ $plano->dados->tipo == 'Receita' ? 'selected' : '' }}>
                                            Receita
                                        </option>
                                        <option value="Despesa" {{ $plano->dados->tipo == 'Despesa' ? 'selected' : '' }}>
                                            Despesa
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria" class="control-label">Categoria</label>
                                    <select name="categoria" id="categoria" class="form-control select2">
                                        <option value="Ativo" {{ $plano->dados->categoria == 'Ativo' ? 'selected' : '' }}>
                                            Ativo
                                        </option>
                                        <option value="Passivo" {{ $plano->dados->categoria == 'Passivo' ? 'selected' : '' }}>
                                            Passivo
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="grupo" class="control-label">Grupo de conta</label>
                                    <select name="grupo_contas_id" id="categoria" class="form-control select2">
                                        @foreach($grupos as $grupo)
                                        <option value="{{ $grupo->id }}" {{ $plano->dados->grupo_contas_id == $grupo->id ? 'selected' : '' }}>
                                            {{ $grupo->descricao }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-pencil"></i> Alterar
                                    </button>
                                    <button class="btn btn-danger" type="button" data-toggle="modal"
                                            data-target="#modal-excluir">
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
    <!-- MODAL EXCLUIR -->
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
                    <h4>Deseja realmente excluir o plano de contas "{{ $plano->dados->descricao }}"?</h4>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST"
                          action="{{ route('financeiros.planodecontas.excluir', ['id' => $plano->dados->id]) }}">
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
            $('.select2').select2();
            $('#descricao').focus();
        });
    </script>
@endsection
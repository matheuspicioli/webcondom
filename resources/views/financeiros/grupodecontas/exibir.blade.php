@extends('adminlte::page')
@section('title', 'Grupo de contas - Editar')
@section('content_header')
    <h1>Grupo de contas - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.grupodecontas.listar') }}"><i class="fa fa-home"></i> Grupo de contas</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Grupo de contas
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.grupodecontas.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Grupo de contas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('financeiros.grupodecontas.alterar', ['id' => $grupo->dados->id ]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="descricao" class="control-label">Descrição</label>
                                    <input id="descricao" type="text" class="form-control pula" name="descricao"
                                           value="{{ $grupo->dados->descricao }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="ratear" class="control-label">Ratear</label>
                                    <select name="ratear" id="ratear" class="form-control select2">
                                        <option value="1" {{ $grupo->dados->ratear == 1 ? 'selected' : '' }}>Sim</option>
                                        <option value="0" {{ $grupo->dados->ratear == 0 ? 'selected' : '' }}>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-pencil"></i> Alterar</button>
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
                    <h4>Deseja realmente excluir o grupo de contas "{{ $grupo->dados->descricao }}"?</h4>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST" action="{{ route('financeiros.grupodecontas.excluir', ['id' => $grupo->dados->id]) }}">
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
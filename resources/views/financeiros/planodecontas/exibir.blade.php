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
                    {!! Form::model($plano, ['route' => ['financeiros.planodecontas.alterar', $plano->id], 'method' => 'PUT']) !!}
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                {!! Form::label('tipo', 'Tipo', ['class' => 'control-label']) !!}
                                {!! Form::select('tipo', [1 => '1', 2 => '2', 3 => '3'], $plano->tipo, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {!! Form::label('grupo', 'Grupo', ['class' => 'control-label']) !!}
                                {!! Form::text('grupo', $plano->grupo, ['class' => 'form-control', 'maxlength' => '3']) !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {!! Form::label('conta', 'Conta', ['class' => 'control-label']) !!}
                                {!! Form::text('conta', $plano->conta, ['class' => 'form-control', 'maxlength' => '4']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            {!! Form::label('ratear', 'Ratear?', ['class' => 'control-label']) !!}
                            {!! Form::select('ratear', ['Sim' => 'Sim', 'Nao' => 'Não'], $plano->ratear, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                {!! Form::label('descricao', 'Descrição', ['class' => 'control-label']) !!}
                                {!! Form::text('descricao', $plano->descricao, ['class' => 'form-control']) !!}
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
                    {!! Form::close() !!}
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
                    <h4>Deseja realmente excluir o plano de contas "{{ $plano->descricao }}"?</h4>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST"
                          action="{{ route('financeiros.planodecontas.excluir', ['id' => $plano->id]) }}">
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
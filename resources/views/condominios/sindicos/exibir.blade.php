@extends('adminlte::page')
@section('title', 'Sindicos - Editar')
@section('content_header')
    <h1>Síndicos - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.sindicos.listar') }}"><i class="fa fa-home"></i> Síndicos</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Síndico
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.sindicos.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("exibir_sindico")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Síndico</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ route('condominios.sindicos.alterar', ['id' => $sindico->id ]) }}" id="form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label" @if($errors->has('nome')) style="color: #f56954" @endif>Nome</label>
                                        <input id="Nome" type="text" class="form-control pula" name="nome" @if($errors->has('nome')) style="border:1px solid #f56954" @endif
                                        	value="{{ old('nome') ? old('nome') : $sindico->nome }}">
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="Telefone" class="control-label" @if($errors->has('telefone')) style="color: #f56954" @endif>Telefone</label>
                                        <input type="text" id="Telefone" name="telefone" class="form-control pula" @if($errors->has('telefone')) style="border:1px solid #f56954" @endif
											   value="{{ old('telefone') ? old('telefone') : ($sindico->telefone ? $sindico->telefone : '') }}">
										@if( $errors->has('telefone') )
											<span style="color: #f56954">{{ $errors->get('telefone')[0] }}</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="Celular" class="control-label" @if($errors->has('celular')) style="color: #f56954" @endif>Celular</label>
                                        <input type="text" id="Celular" name="celular" class="form-control pula"
                                               value="{{ old('celular') ? old('celular') : $sindico->celular }}" @if($errors->has('celular')) style="border:1px solid #f56954" @endif>
										@if( $errors->has('celular') )
											<span style="color: #f56954">{{ $errors->get('celular')[0] }}</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_sindico")
                                            <button class="btn btn-info" type="submit" id="salvar">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @endcan
                                        @can("deletar_sindico")
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
    <!-- MODAL EXCLUIR CONDOMÍNIO -->
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
                    <h4>Deseja realmente excluir o Síndico "{{ $sindico->nome }}"?</h4>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST" action="{{ route('condominios.sindicos.excluir', ['id' => $sindico->id]) }}">
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
            $('#Nome').focus();
            $('#Celular').mask('(00) 00000-0000');
            $('#Telefone').mask('(00) 0000-0000');
        });
        $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#Celular').unmask();
            $('#Telefone').unmask();
            $('#form').submit();
        });

    </script>
@endsection

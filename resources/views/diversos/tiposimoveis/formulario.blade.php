@php
    $editar = isset($tipoImovel);
	$tab = 0;
@endphp
@extends('adminlte::page')
@section('title', 'Tipos de Imóveis - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
		<h1>Tipos de Imóveis - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Tipos de Imóveis</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.tiposimoveis.listar') }}"><i class="fa fa-home"></i> Tipos de Imóveis</a>
        </li>
		<li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} tipo de imóvel
		</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('diversos.tiposimoveis.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
					<h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} tipo de imóvel</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
					@if( $editar )
						<form method="POST" action="{{ route('diversos.tiposimoveis.alterar', ['id' => $tipoImovel->id ]) }}" id="form">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
					@else
						<form method="POST" action="{{ route('diversos.tiposimoveis.salvar') }}" id="form">
							{{ csrf_field() }}
					@endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('descricao')) has-error @endif">
									@component('formularios.String',[
										'id'		=> 'Descricao',
										'nome'		=> 'descricao',
										'texto'		=> 'Descrição',
										'valor'		=> old('descricao') ?? $tipoImovel->descricao ?? ''
									])@endcomponent
                                    @if( $errors->has('descricao') )
                                        <span style="color: #f56954">{{ $errors->get('descricao')[0] }}</span>
                                    @endif
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
	@if( $editar )
		<!-- MODAL EXCLUIR Tipos de Imóveis -->
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
                    <h4>Deseja realmente excluir o tipo de imóvel "{{ $tipoImovel->descricao }}"?</h4>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST" action="{{ route('diversos.tiposimoveis.excluir', ['id' => $tipoImovel->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	@endif
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#Descricao').focus();
        });
    </script>
@endsection

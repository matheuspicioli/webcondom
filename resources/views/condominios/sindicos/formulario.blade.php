@php
    $editar = isset($sindico);
@endphp
@extends('adminlte::page')
@section('title', 'Sindicos - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
		<h1>Síndicos - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Síndicos</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.sindicos.listar') }}"><i class="fa fa-home"></i> Síndicos</a>
        </li>
		<li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Síndico
		</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
			@component('formularios.Link',[
				'link'		=> route('condominios.sindicos.listar'),
				'classes'	=> 'btn btn-default',
				'icone'		=> 'fa fa-rotate-left',
				'texto'		=> 'Voltar'
			])@endcomponent
            <hr>
        </div>
    </div>
    @can("exibir_sindico")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
						<h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} Síndico</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( isset($condominio) )
							<form method="POST" action="{{ route('condominios.sindicos.alterar', ['id' => $sindico->id ]) }}" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('condominios.sindicos.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('nome')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Nome',
											'nome'		=> 'nome',
											'texto'		=> 'Nome',
											'valor'		=> old('nome') ?? $sindico->nome ?? '',
											'tabindex'	=> '1'
										])@endcomponent
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('telefone')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Telefone',
											'nome'		=> 'telefone',
											'texto'		=> 'Telefone',
											'valor'		=> old('telefone') ?? $sindico->telefone ?? '',
											'tabindex'	=> '2',
											'atributos'	=> 'data-mask=(99)9999-9999'
										])@endcomponent
										@if( $errors->has('telefone') )
											<span style="color: #f56954">{{ $errors->get('telefone')[0] }}</span>
										@endif
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('celular')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Celular',
											'nome'		=> 'celular',
											'texto'		=> 'Celular',
											'valor'		=> old('celular') ?? $sindico->celular ?? '',
											'tabindex'	=> '3',
											'atributos'	=> 'data-mask=(99)99999-9999'
										])@endcomponent
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
											@component('formularios.Botao',[
												'classes' 	=> 'btn-info',
												'icone'		=> 'fa fa-save',
												'id'		=> 'salvar',
												'texto'		=> 'Salvar'
											])@endcomponent
                                        @else
											@component('formularios.Botao',[
												'classes' 	=> 'btn-info',
												'icone'		=> 'fa fa-save',
												'id'		=> 'salvar',
												'texto'		=> 'Salvar',
												'atributos'	=> 'disabled'
											])@endcomponent
                                        @endcan
                                        @can("deletar_sindico")
											@component('formularios.Botao',[
												'classes' 	=> 'btn-danger',
												'icone'		=> 'fa fa-trash',
												'texto'		=> 'Excluir',
												'atributos'	=> 'type=button',
												'toggle'	=> 'modal',
												'target'	=> '#modal-excluir'
											])@endcomponent
                                        @else
											@component('formularios.Botao',[
												'classes' 	=> 'btn-danger',
												'icone'		=> 'fa fa-trash',
												'texto'		=> 'Excluir',
												'atributos'	=> 'type=button disabled',
												'toggle'	=> 'modal',
												'target'	=> '#modal-excluir'
											])@endcomponent
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
	@if( $editar )
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
	@endif
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#Nome').focus();
        });
            $('#salvar').on('click', function(e){
            e.preventDefault();
            $('#Celular').unmask();
            $('#Telefone').unmask();
            $('#form').submit();
        });

    </script>
@endsection

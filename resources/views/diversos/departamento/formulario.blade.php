@php
	$editar = isset($departamento);
	$tab = 0;
@endphp
@extends('adminlte::page')
@section('title', 'Departamentos - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
		<h1>Departamentos - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Departamentos</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.departamento.listar') }}"><i class="fa fa-home"></i> Departamentos</a>
        </li>
		<li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Departamento
		</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('diversos.departamento.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("exibir_departamento")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
						<h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} departamento</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( isset($departamento) )
							<form method="POST" action="{{ route('diversos.departamento.alterar', ['id' => $departamento->id ]) }}" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('diversos.departamento.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
                                <div class="row">
                                    <div class="col-md-12">
										<div class="form-group @if($errors->has('descricao')) has-error @endif">
											@component('formularios.String',[
												'id'		=> 'Descricao',
												'nome'		=> 'descricao',
												'texto'		=> 'Descrição',
												'valor'		=> old('descricao') ?? $departamento->descricao ?? ''
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
                                            @can("editar_departamento")
                                                <button class="btn btn-info" type="submit">
                                                    <i class="fa fa-save"></i> Salvar</button>
                                            @else
                                                <button disabled class="btn btn-info" type="submit">
                                                    <i class="fa fa-save"></i> Salvar</button>
                                            @endcan
                                            @can("deletar_departamento")
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
		@if( $editar )
			<!-- MODAL EXCLUIR DEPARTAMENTOS -->
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
							<h4>Deseja realmente excluir o departamento "{{ $departamento->descricao }}"?</h4>
						</div>

						<div class="modal-footer">
							<button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
							<form method="POST" action="{{ route('diversos.departamento.excluir', ['id' => $departamento->id]) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-outline" type="submit">Confirmar exclusão</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		@endif
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#Descricao').focus();
        });
    </script>
@endsection

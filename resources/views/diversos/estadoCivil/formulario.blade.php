@php
    $editar = isset($estadoCivil);
	$tab = 0;
@endphp
@extends('adminlte::page')
@section('title', 'Estado Civil - Exibir/Alterar')
@section('content_header')
	@if($editar)
		<h1>Estado Civil - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Estado Civil</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('diversos.estadoCivil.listar') }}"><i class="fa fa-home"></i> Estado Civil</a>
        </li>
		<li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Estado Civil
		</li>
    </ol>
@stop
@section('content')
    @can("exibir_estadocivil")
        <div class="row">
            <div class="col-md-1">
                <a href="{{ route('diversos.estadoCivil.listar') }}" class="btn btn-default">
                    <i class="fa fa-rotate-left"></i> Voltar</a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
						<h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} estado civil</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( $editar )
							<form method="POST" action="{{ route('diversos.estadoCivil.alterar', ['id' => $estadoCivil->id ]) }}" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('diversos.estadoCivil.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group @if($errors->has('descricao')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'descricao',
											'nome'		=> 'descricao',
											'texto'		=> 'Descrição',
											'valor'		=> old('descricao') ?? $estadoCivil->descricao ?? '',
											'tabindex'	=> $tab += 1
										])@endcomponent
									</div>
                                    @if( $errors->has('descricao') )
                                        <span style="color: #f56954">{{ $errors->get('descricao')[0] }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('exige_conjuge')) has-error @endif">
										@component('formularios.Select',[
											'id'		=> 'ExigeConjuge',
											'nome'		=> 'exige_conjuge',
											'texto'		=> 'Exige conjuge?',
											'tabindex'	=> $tab += 1,
											'classes'	=> 'select2'
										])
											<option disabled selected>----------Selecione----------</option>
											@if( $editar )
												<option value="Sim" {{ old('exige_conjuge') == 'Sim' ? 'selected' : ($estadoCivil->exige_conjuge == 'Sim' ? 'selected' : '') }}>
													Sim
												</option>
												<option value="Nao" {{ old('exige_conjuge') == 'Nao' ? 'selected' : ($estadoCivil->exige_conjuge == 'Nao' ? 'selected' : '') }}>
													Não
												</option>
											@else
												<option value="Sim" {{ old('exige_conjuge') == 'Sim' ? 'selected' : '' }}>
													Sim
												</option>
												<option value="Nao" {{ old('exige_conjuge') == 'Nao' ? 'selected' : '' }}>
													Não
												</option>
											@endif
										@endcomponent
                                        @if( $errors->has('exige_conjuge') )
                                            <span style="color: #f56954">{{ $errors->get('exige_conjuge')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_estadocivil")
                                            <button class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @endcan
                                        @can("deletar_estadocivil")
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
			<!-- MODAL EXCLUIR ESTADO CIVIL -->
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
                        <h4>Deseja realmente excluir estado civil "{{ $estadoCivil->descricao }}"?</h4>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST" action="{{ route('diversos.estadoCivil.excluir', ['id' => $estadoCivil->id]) }}">
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
@section('js')
	<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#Descricao').focus();
            $('.select2').select2();
        });
    </script>
@endsection
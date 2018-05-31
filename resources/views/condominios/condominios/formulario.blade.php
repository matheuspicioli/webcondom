@php
    $editar = isset($condominio);
@endphp
@extends('adminlte::page')
@section('title', 'Condominios - '.($editar ? 'Exibir/Alterar' : 'Cadastrar') )
@section('content_header')
	@if($editar)
		<h1>Condomínios - <small>edição</small></h1>
	@else
		<h1>Cadastro <small>de Condomínios</small></h1>
	@endif
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.condominios.listar') }}"><i class="fa fa-home"></i> Condomínios</a>
        </li>
        <li class="active">
			<i class="fa fa-pencil"></i> {{ $editar ? 'Editar' : 'Cadastrar' }} Condomínio
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
			@component('formularios.Link',[
				'link'		=> route('condominios.condominios.listar'),
				'classes'	=> 'btn btn-default',
				'icone'		=> 'fa fa-rotate-left',
				'texto'		=> 'Voltar'
			])@endcomponent
            <hr>
        </div>
    </div>
    @can("exibir_condominio")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $editar ? 'Editar' : 'Cadastrar' }} Condomínio</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
						@if( isset($condominio) )
							<form method="POST" action="{{ route('condominios.condominios.alterar', ['id' => $condominio->id ]) }}" id="form">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						@else
							<form method="POST" action="{{ route('condominios.condominios.salvar') }}" id="form">
								{{ csrf_field() }}
						@endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('nome')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Nome',
											'nome'		=> 'nome',
											'texto'		=> 'Nome',
											'valor'		=> old('nome') ?? $condominio->nome ?? '',
											'tabindex'	=> '1',
											'titulo'	=> 'Nome',
										])@endcomponent
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('apelido')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Apelido',
											'nome'		=> 'apelido',
											'texto'		=> 'Apelido',
											'valor'		=> old('apelido') ?? $condominio->apelido ?? '',
											'tabindex'	=> '2',
											'titulo'	=> 'Apelido',
										])@endcomponent
                                        @if( $errors->has('apelido') )
                                            <span style="color: #f56954">{{ $errors->get('apelido')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('telefone')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Telefone',
											'nome'		=> 'telefone',
											'texto'		=> 'Telefone',
											'valor'		=> old('telefone') ?? $condominio->telefone ?? '',
											'tabindex'	=> '3',
											'atributos'	=> 'data-mask=(99)9999-9999'
										])@endcomponent
                                        @if( $errors->has('telefone') )
                                            <span style="color: #f56954">{{ $errors->get('telefone')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('celular')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Celular',
											'nome'		=> 'celular',
											'texto'		=> 'Celular',
											'valor'		=> old('celular') ?? $condominio->celular ?? '',
											'tabindex'	=> '4',
											'atributos'	=> 'data-mask=(99)99999-9999'
										])@endcomponent
                                        @if( $errors->has('celular') )
                                            <span style="color: #f56954">{{ $errors->get('celular')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group @if($errors->has('unidades')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'Unidades',
											'nome'		=> 'unidades',
											'texto'		=> 'Unidades',
											'valor'		=> old('unidades') ?? $condominio->unidades ?? '',
											'tabindex'	=> '5'
										])@endcomponent
                                        @if( $errors->has('unidades') )
                                            <span style="color: #f56954">{{ $errors->get('unidades')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group @if($errors->has('tem_gas')) has-error @endif">
										@component('formularios.Select',[
											'id'		=> 'TemGas',
											'nome'		=> 'tem_gas',
											'texto'		=> 'Tem gas?',
											'tabindex'	=> '6',
											'classes'	=> 'select2',
										])
											<option disabled selected>----------Selecione----------</option>
											@if ( isset($condominio) )
												<option value="Sim" {{ old('tem_gas') == 'Sim' ? 'selected' : ($condominio->tem_gas == 'Sim' ? 'selected' : '') }}>
													Sim
												</option>
												<option value="Nao" {{ old('tem_gas') == 'Nao' ? 'selected' : ($condominio->tem_gas == 'Nao' ? 'selected' : '') }}>
													Não
												</option>
											@else
												<option value="Sim" {{ old('tem_gas') == 'Sim' ? 'selected' : '' }}>
													Sim
												</option>
												<option value="Nao" {{ old('tem_gas') == 'Nao' ? 'selected' : '' }}>
													Não
												</option>
											@endif
										@endcomponent
                                        @if( $errors->has('tem_gas') )
                                            <span style="color: #f56954">{{ $errors->get('tem_gas')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group @if($errors->has('valor_gas')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'ValorGas',
											'nome'		=> 'valor_gas',
											'texto'		=> 'Valor do gás (R$)',
											'valor'		=> old('valor_gas') ?? $condominio->valor_gas_view ?? '',
											'tabindex'	=> '7'
										])@endcomponent
                                        @if( $errors->has('valor_gas') )
                                            <span style="color: #f56954">{{ $errors->get('valor_gas')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('sindico_id')) has-error @endif">
										@component('formularios.Select',[
											'id'		=> 'SindicoCOD',
											'nome'		=> 'sindico_id',
											'texto'		=> 'Síndico',
											'tabindex'	=> '8',
											'classes'	=> 'select2',
										])
											<option disabled selected>----------Selecione----------</option>
											@foreach($sindicos as $sindico)
												@if( isset($condominio) )
													<option value="{{ $sindico->id }}" {{ old('sindico_id') == $sindico->id ? 'selected' : ($sindico->id == $condominio->sindico_id ? 'selected' : '') }}>
														{{ $sindico->nome }}
													</option>
												@else
													<option value="{{ $sindico->id }}" {{ old('sindico_id') == $sindico->id ? 'selected' : '' }}>
														{{ $sindico->nome }}
													</option>
												@endif
											@endforeach
										@endcomponent
                                        @if( $errors->has('sindico_id') )
                                            <span style="color: #f56954">{{ $errors->get('sindico_id')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @if($errors->has('email')) has-error @endif">
										@component('formularios.String',[
											'id'		=> 'email',
											'nome'		=> 'email',
											'texto'		=> 'E-mail',
											'valor'		=> old('email') ?? $condominio->email ?? '',
											'tabindex'	=> '9'
										])@endcomponent
                                        @if( $errors->has('email') )
                                            <span style="color: #f56954">{{ $errors->get('email')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
								@component('formularios.enderecos.Endereco',[
									'model'     => $condominio ?? null,
									'cidades'   => $cidades,
									'prox_tab'	=> '10'
								])@endcomponent
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_condominio")
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
                                        @can("deletar_condominio")
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
		@if( $editar )
        	<div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Taxas do condomínio
                            - @component('formularios.Link',[
								'link' 		=> route('condominios.condominiostaxas.criar', ['idCondominio' => $condominio->id]),
								'texto'		=> 'cadastrar taxas'
							])@endcomponent
						</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taxas as $taxa)
                                <tr>
                                    <td>{{ $taxa->descricao }}</td>
                                    <td>{{ $taxa->valor }}</td>
                                    <td>
										@component('formularios.Link',[
											'link' 		=> route('condominios.condominiostaxas.exibir', ['id' => $taxa->id, 'idCondominio' => $condominio->id]),
											'icone'		=> 'fa fa-pencil',
											'classes'	=> 'btn btn-warning btn-sm'
										])@endcomponent
										@component('formularios.Botao',[
											'classes' 	=> 'btn-danger btn-sm',
											'icone'		=> 'fa fa-trash',
											'id'		=> 'excluir-taxa',
											'toggle'	=> 'modal',
											'texto'		=> '',
											'target'	=> "#modal-danger-$taxa->id"
										])@endcomponent
                                        <!-- MODAL EXCLUIR TAXA GERANDO DINÂMICO -->
                                        <div id="modal-danger-{{$taxa->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja realmente excluir a taxa "{{ $taxa->descricao }}"?</h4>
                                                    </div>
                                                    <div class="modal-footer">
														@component('formularios.Botao',[
															'classes' 	=> 'btn btn-outline pull-left',
															'atributos'	=> 'type=button data-dismiss=modal',
															'texto'		=> 'Fechar'
														])@endcomponent
                                                        <form method="POST" action="{{ route('condominios.condominiostaxas.excluir', ['id' => $taxa->id, 'idCondominio' => $condominio->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
															@component('formularios.Botao',[
																'classes' 	=> 'btn btn-outline',
																'atributos'	=> 'type=submit',
																'texto'		=> 'Confirmar exclusão'
															])@endcomponent
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                    <h4>Deseja realmente excluir o condomínio "{{ $condominio->nome }}"?</h4>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST" action="{{ route('condominios.condominios.excluir', ['id' => $condominio->id]) }}">
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
    <script src="{{ asset('js/mask/jquery.mask.min.js') }}"></script>
	<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#Nome').focus();
            if ($("select[id=TemGas]").val() == 'Sim')
                $("#ValorGas").prop("disabled", false);
            else{
				$("#ValorGas").prop("disabled", true);
				$("#ValorGas").val('');
            }
            $("select[id=TemGas]").on('change', function () {
                if ($("select[id=TemGas]").val() != 'Sim'){
					$("#ValorGas").prop("disabled", true);
					$("#ValorGas").val('');
                }
                else
                    $("#ValorGas").prop("disabled", false);
            });
        });
        $('#salvar').on('click', function(e){
        	e.preventDefault();
			$('#Celular').unmask();
			$('#Telefone').unmask();
			$('#CEP').unmask();
			$('#form').submit();
        });
    </script>
@endsection
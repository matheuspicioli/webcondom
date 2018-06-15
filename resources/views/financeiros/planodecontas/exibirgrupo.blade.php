@php
	$tab = 0;
@endphp
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
                    <h3 class="box-title">Editar plano de contas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ route('financeiros.planodecontas.alterar', ['plano' => $plano->id, 'grupo' => $grupo->id]) }}"
                          method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="col-md-3">
                                    <div class="form-group">
										@component('formularios.Select',[
											'id'		=> 'plano',
											'nome'		=> 'plano',
											'texto'		=> 'Tipo',
											'tabindex'	=> $tab += 1,
											'classes'	=> 'select2'
										])
											@foreach($planos as $planosF)
												<option {{$planosF->id == $plano->id ? 'selected' : '' }} value="{{ $planosF->id }}">{{ $planosF->tipo }}
													- {{ $planosF->descricao }}</option>
											@endforeach
										@endcomponent
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
										@component('formularios.String',[
											'id'		=> 'grupo',
											'nome'		=> 'grupo',
											'texto'		=> 'Grupo',
											'valor'		=> $grupo->grupo ?? null,
											'tabindex'	=> $tab += 1,
											'atributos'	=> 'maxlength=3 readonly'
										])@endcomponent
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
										@component('formularios.String',[
											'id'		=> 'conta',
											'nome'		=> 'conta',
											'texto'		=> 'Conta',
											'valor'		=> null,
											'tabindex'	=> $tab += 1,
											'atributos'	=> 'maxlength=4 disabled'
										])@endcomponent
                                    </div>
                                </div>
                                <div class="col-md-2">
									@component('formularios.Select',[
										'id'		=> 'ratear',
										'nome'		=> 'ratear',
										'texto'		=> 'Ratear?',
										'tabindex'	=> $tab += 1,
										'classes'	=> 'select2'
									])
										<option {{$grupo->ratear == 'Sim' ? 'selected' : '' }} value="Sim">
											Sim
										</option>
										<option {{$grupo->ratear == 'Não' ? 'selected' : '' }} value="Não">
											Não
										</option>
									@endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									@component('formularios.String',[
										'id'		=> 'descricao_grupo',
										'nome'		=> 'descricao_grupo',
										'texto'		=> 'Descrição grupo',
										'valor'		=> $grupo->descricao ?? null,
										'tabindex'	=> $tab += 1
									])@endcomponent
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									@component('formularios.String',[
										'id'		=> 'descricao_conta',
										'nome'		=> 'descricao_conta',
										'texto'		=> 'Descrição conta',
										'valor'		=> $grupo->descricao ?? null,
										'tabindex'	=> $tab += 1,
										'atributos'	=> 'disabled'
									])@endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
									@component('formularios.Botao',[
										'classes'	=> 'btn-info',
										'icone'		=> 'fa fa-pencil',
										'texto'		=> 'Alterar',
										'atributos'	=> 'type=submit'
									])@endcomponent
                                </div>
                            </div>
                        </div>
                    </form>
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
                    <h3 class="modal-title">Erro ao consultar grupo</h3>
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
@endsection
@section('js')
	<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#plano').focus();
            $('#plano').attr('disabled', true);
            // $('#grupo').blur(function () {
            //     tipo = $('#tipo').val();
            //     grupo = $('#grupo').val();
            //     $.ajax({
            //         url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximaConta/" + tipo + '/' + grupo,
            //         type: "GET"
            //     }).done(function (retorno) {
            //         $('#conta').val(retorno);
            //         if ($('#conta').val() == '') {
            //             $('#conta').val('0001');
            //         }
            //     }).fail(function (xhr, status, retorno) {
            //         console.log("Erro ao consultar próxima conta (blur grupo). " + retorno);
            //     });
            // });
        });
    </script>
@endsection
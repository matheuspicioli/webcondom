@extends('adminlte::page')
@section('title', 'Balancete lançamentos - Cadastrar')
@section('content_header')
    <h1>Cadastro
        <small>de balancete lançamentos</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('balancetes.lancamentos.listar',['idBalancete'=>$idBalancete]) }}"><i class="fa fa-group"></i> Balancete lançamentos</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar balancete lançamento
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('balancetes.lancamentos.listar',['idBalancete'=>$idBalancete]) }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_balancete_lancamento")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar balancete lançamento</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('balancetes.lancamentos.salvar') }}" method="POST">
                            {{ csrf_field() }}
							<input type="hidden" value="{{ old('balancete_id') ? old('balancete_id') : $idBalancete }}" name="balancete_id">
							<div class="row">
								<div class="col-md-2 col-md-offset-2">
									<div class="form-group">
										<label for="data_lancamento" class="control-label"
											   @if($errors->has('data_lancamento')) style="color: #f56954" @endif>Data lançamento</label>
										<input type="date" name="data_lancamento" id="data_lancamento"
											   class="form-control" @if($errors->has('data_lancamento')) style="border:1px solid #f56954" @endif
											   value="{{ old('data_lancamento') ? old('data_lancamento') : '' }}">
										@if( $errors->has('data_lancamento') )
											<span style="color: #f56954">{{ $errors->get('data_lancamento')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="documento" class="control-label"
											   @if($errors->has('documento')) style="color: #f56954" @endif>Documento</label>
										<input type="text" id="documento" name="documento" class="form-control pula"
											   @if($errors->has('documento')) style="border:1px solid #f56954" @endif
											   value="{{ old('documento') ? old('documento') : '' }}">
										@if( $errors->has('documento') )
											<span style="color: #f56954">{{ $errors->get('documento')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="historico" class="control-label"
											   @if($errors->has('historico')) style="color: #f56954" @endif>Histórico</label>
										<input type="text" id="historico" name="historico" class="form-control pula"
											   @if($errors->has('historico')) style="border:1px solid #f56954" @endif
											   value="{{ old('historico') ? old('historico') : '' }}">
										@if( $errors->has('historico') )
											<span style="color: #f56954">{{ $errors->get('historico')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-md-offset-3">
									<div class="form-group">
										<label for="valor" class="control-label"
											   @if($errors->has('valor')) style="color: #f56954" @endif>Valor</label>
										<input type="text" id="valor" name="valor" class="form-control pula"
											   @if($errors->has('valor')) style="border:1px solid #f56954" @endif
											   value="{{ old('valor') ? old('valor') : '' }}">
										@if( $errors->has('valor') )
											<span style="color: #f56954">{{ $errors->get('valor')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="tipo" class="control-label"
											   @if($errors->has('tipo')) style="color: #f56954" @endif>Tipo</label>
										<select name="tipo" id="tipo" class="form-control select2">
											<option value="Debito" {{ old('tipo') == 'Debito' ? 'selected' : '' }}>
												Débito
											</option>
											<option value="Credito" {{ old('tipo') == 'Credito' ? 'selected' : '' }}>
												Crédito
											</option>
										</select>
										@if( $errors->has('tipo') )
											<span style="color: #f56954">{{ $errors->get('tipo')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="folha" class="control-label"
											   @if($errors->has('folha')) style="color: #f56954" @endif>Folha</label>
										<input type="text" id="folha" name="folha" class="form-control pula"
											   @if($errors->has('folha')) style="border:1px solid #f56954" @endif
											   value="{{ old('folha') ? old('folha') : '' }}">
										@if( $errors->has('folha') )
											<span style="color: #f56954">{{ $errors->get('folha')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-md-offset-2">
									<div class="form-group">
										<label for="plano_contas_id" class="control-label" @if($errors->has('plano_contas_id')) style="color: #f56954" @endif>Plano de contas</label>
										<select name="plano_contas_id" id="plano_contas_id" class="form-control select2">
											@foreach($plano_contas as $plano_conta)
												@foreach($plano_conta->grupos as $grupo)
													@foreach($grupo->contas as $conta)
														<option value="{{ $conta->id }}" {{ old('plano_contas_id') == $conta->id
															? 'selected' : '' }}>
															{{ $plano_conta->tipo }}.{{ $grupo->grupo }}.{{ $conta->conta }} - {{ $conta->descricao }}
														</option>
													@endforeach
												@endforeach
											@endforeach
										</select>
										@if( $errors->has('plano_contas_id') )
											<span style="color: #f56954">{{ $errors->get('plano_contas_id')[0] }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="fornecedor_id" class="control-label" @if($errors->has('fornecedor_id')) style="color: #f56954" @endif>Fornecedor</label>
										<select name="fornecedor_id" id="fornecedor_id" class="form-control select2">
											@foreach($fornecedores as $fornecedor)
												<option value="{{ $fornecedor->id }}" {{ old('fornecedor_id') == $fornecedor->id
													? 'selected' : '' }}>
													{{ $fornecedor->entidade->nome }}
												</option>
											@endforeach
										</select>
										@if( $errors->has('fornecedor_id') )
											<span style="color: #f56954">{{ $errors->get('fornecedor_id')[0] }}</span>
										@endif
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i> Cadastrar</button>
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
@endsection
@section('js')
    <script>
        $(document).ready(function () {
        	$('#data_lancamento').focus();
            $('.select2').select2();
        });
    </script>
@endsection
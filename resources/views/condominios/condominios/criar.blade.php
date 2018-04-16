@extends('adminlte::page')
@section('title', 'Condominios - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de condomínios</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.condominios.listar') }}"><i class="fa fa-home"></i> Condomínios</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar condomínio
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.condominios.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_condominio")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar condomínio</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('condominios.condominios.salvar') }}" method="POST" id="form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label" @if($errors->has('nome')) style="color: #f56954" @endif>Nome</label>
                                        <input id="Nome" type="text" class="form-control pula" name="nome" value="{{ old('nome') }}" @if($errors->has('nome')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apelido" class="control-label" @if($errors->has('apelido')) style="color: #f56954" @endif>Apelido</label>
                                        <input id="Apelido" type="text" class="form-control pula" name="apelido" value="{{ old('apelido') }}" @if($errors->has('apelido')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('apelido') )
                                            <span style="color: #f56954">{{ $errors->get('apelido')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Telefone" class="control-label" @if($errors->has('telefone')) style="color: #f56954" @endif>Telefone</label>
                                        <input id="Telefone" type="text" class="form-control pula" name="telefone" value="{{ old('telefone') }}" @if($errors->has('telefone')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('telefone') )
                                            <span style="color: #f56954">{{ $errors->get('telefone')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label" @if($errors->has('celular')) style="color: #f56954" @endif>Celular</label>
                                        <input id="Celular" type="text" class="form-control pula" name="celular" value="{{ old('celular') }}" @if($errors->has('celular')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('celular') )
                                            <span style="color: #f56954">{{ $errors->get('celular')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Unidades" class="control-label" @if($errors->has('unidades')) style="color: #f56954" @endif>Unidades</label>
                                        <input id="Unidades" type="text" class="form-control pula" name="unidades" value="{{ old('unidades') }}" @if($errors->has('unidades')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('unidades') )
                                            <span style="color: #f56954">{{ $errors->get('unidades')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="TemGas" class="control-label" @if($errors->has('tem_gas')) style="color: #f56954" @endif>Tem gas?</label>
                                        <select name="tem_gas" id="TemGas" class="form-control pula" @if($errors->has('tem_gas')) style="border:1px solid #f56954" @endif>
                                            <option disabled selected>Selecione</option>
                                            <option value="Sim" {{ old('tem_gas') == 'Sim' ? 'selected' : '' }}>Sim</option>
                                            <option value="Nao" {{ old('tem_gas') == 'Nao' ? 'selected' : '' }}>Não</option>
                                        </select>
                                        @if( $errors->has('tem_gas') )
                                            <span style="color: #f56954">{{ $errors->get('tem_gas')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ValorGas" class="control-label" @if($errors->has('valor_gas')) style="color: #f56954" @endif>Valor do gás (R$)</label>
                                        <input id="ValorGas" type="text" class="form-control pula" name="valor_gas" value="{{ old('valor_gas') }}" disabled @if($errors->has('valor_gas')) style="border:1px solid #f56954" @endif>
                                        @if( $errors->has('valor_gas') )
                                            <span style="color: #f56954">{{ $errors->get('valor_gas')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SindicoCOD" class="control-label" @if($errors->has('sindico_id')) style="color: #f56954" @endif>Síndico</label>
                                        <select name="sindico_id" id="SindicoCOD" class="form-control pula select2" @if($errors->has('sindico_id')) style="border:1px solid #f56954" @endif>
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($sindicos as $sindico)
                                                <option value="{{ $sindico->id }}" {{ old('sindico_id') == $sindico->id ? 'selected' : '' }}>
                                                    {{ $sindico->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if( $errors->has('sindico_id') )
                                            <span style="color: #f56954">{{ $errors->get('sindico_id')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="email" class="control-label" @if($errors->has('email')) style="color: #f56954" @endif>Email</label>
                                          <input id="email" type="text" class="form-control pula" name="email" value="{{ old('email') }}" @if($errors->has('email')) style="border:1px solid #f56954" @endif>
                                          @if( $errors->has('email') )
                                              <span style="color: #f56954">{{ $errors->get('email')[0] }}</span>
                                          @endif
                                      </div>
                                 </div>
                            </div>
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Endereço</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="CEP" class="control-label" @if($errors->has('cep')) style="color: #f56954" @endif>CEP</label>
                                                <input id="CEP" type="text" class="form-control pula" name="cep" value="{{ old('cep') }}" @if($errors->has('cep')) style="border:1px solid #f56954" @endif>
                                                @if( $errors->has('cep') )
                                                    <span style="color: #f56954">{{ $errors->get('cep')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="Logradouro" class="control-label" @if($errors->has('logradouro')) style="color: #f56954" @endif>Logradouro</label>
                                                <input id="Logradouro" type="text" class="form-control pula" name="logradouro" value="{{ old('logradouro') }}" @if($errors->has('logradouro')) style="border:1px solid #f56954" @endif>
                                                @if( $errors->has('logradouro') )
                                                    <span style="color: #f56954">{{ $errors->get('logradouro')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="Numero" class="control-label" @if($errors->has('numero')) style="color: #f56954" @endif>Número</label>
                                                <input id="Numero" type="text" class="form-control pula" name="numero" value="{{ old('numero') }}" @if($errors->has('numero')) style="border:1px solid #f56954" @endif>
                                                @if( $errors->has('numero') )
                                                    <span style="color: #f56954">{{ $errors->get('numero')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="Complemento" class="control-label" @if($errors->has('complemento')) style="color: #f56954" @endif>Complemento</label>
                                                <input id="Complemento" type="text" class="form-control pula" name="complemento" value="{{ old('complemento') }}" @if($errors->has('complemento')) style="border:1px solid #f56954" @endif>
                                                @if( $errors->has('complemento') )
                                                    <span style="color: #f56954">{{ $errors->get('complemento')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Bairro" class="control-label" @if($errors->has('bairro')) style="color: #f56954" @endif>Bairro</label>
                                                <input id="Bairro" type="text" class="form-control pula" name="bairro" value="{{ old('bairro') }}" @if($errors->has('bairro')) style="border:1px solid #f56954" @endif>
                                                @if( $errors->has('bairro') )
                                                    <span style="color: #f56954">{{ $errors->get('bairro')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="CidadeCOD" class="control-label" @if($errors->has('cidade_id')) style="color: #f56954" @endif>Cidade</label>
                                                <select name="cidade_id" id="CidadeCOD" class="form-control pula select2" @if($errors->has('cidade_id')) style="border:1px solid #f56954" @endif>
                                                    <option selected disabled>-------Selecione uma cidade-------</option>
                                                    @foreach($cidades as $cidade)
                                                        <option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : '' }}>{{ $cidade->descricao }}
                                                            - {{ $cidade->estado->descricao }}</option>
                                                    @endforeach
                                                </select>
                                                @if( $errors->has('cidade_id') )
                                                    <span style="color: #f56954">{{ $errors->get('cidade_id')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" id="salvar">
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
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $("#Nome").focus();
            $("select[id=TemGas]").on('change', function () {
                if ($("select[id=TemGas]").val() != 'Sim'){
					$("#ValorGas").prop("disabled", true);
					$("#ValorGas").val('');
                }
                else
                    $("#ValorGas").prop("disabled", false);
            });
			$('#Celular').mask('(00) 00000-0000');
			$('#Telefone').mask('(00) 0000-0000');
			$('#CEP').mask('00000-000');
			//$('#ValorGas').mask("#.##0,00", {reverse: true});
        });
		$('#salvar').on('click', function(e){
			e.preventDefault();
			$('#Celular').unmask();
			$('#Telefone').unmask();
			$('#CEP').unmask();
			$('#form').submit();
		});
    </script>
@stop
@extends('adminlte::page')
@section('title', 'Condominios - Editar')
@section('content_header')
    <h1>Condomínios - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.condominios.listar') }}"><i class="fa fa-home"></i> Condomínios</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Condomínio
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
    @can("exibir_condominio")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Condomínio</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ route('condominios.condominios.alterar', ['id' => $condominio->id ]) }}" id="form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label" @if($errors->has('nome')) style="color: #f56954" @endif>Nome</label>
                                        <input id="Nome" type="text" class="form-control pula" name="nome" @if($errors->has('nome')) style="border:1px solid #f56954" @endif
                                               value="{{ old('nome') ? old('nome') : $condominio->nome }}">
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apelido" class="control-label" @if($errors->has('apelido')) style="color: #f56954" @endif>Apelido</label>
                                        <input id="Apelido" type="text" class="form-control pula" name="apelido" @if($errors->has('apelido')) style="border:1px solid #f56954" @endif
                                               value="{{ old('apelido') ? old('apelido') : $condominio->apelido }}">
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
                                        <input id="Telefone" type="text" class="form-control pula" name="telefone" @if($errors->has('telefone')) style="border:1px solid #f56954" @endif
                                            data-mask="(99) 9999-9999" value="{{ old('telefone') ? old('telefone') : ($condominio->telefone ? $condominio->telefone : '')  }}">
                                        @if( $errors->has('telefone') )
                                            <span style="color: #f56954">{{ $errors->get('telefone')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label" @if($errors->has('celular')) style="color: #f56954" @endif>Celular</label>
                                        <input id="Celular" type="text" class="form-control pula" name="celular" @if($errors->has('celular')) style="border:1px solid #f56954" @endif
                                        data-mask="(99) 99999-9999" value="{{ old('celular') ? old('celular') : $condominio->celular }}">
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
                                        <input id="Unidades" type="number" min="0" class="form-control pula" name="unidades" @if($errors->has('unidades')) style="border:1px solid #f56954" @endif
                                               value="{{ old('unidades') ? old('unidades') : $condominio->unidades }}">
                                        @if( $errors->has('unidades') )
                                            <span style="color: #f56954">{{ $errors->get('unidades')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="TemGas" class="control-label" @if($errors->has('tem_gas')) style="color: #f56954" @endif>Tem gas?</label>
                                        <select name="tem_gas" id="TemGas" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="Sim" {{ old('tem_gas') == 'Sim' ? 'selected' : ($condominio->tem_gas == 'Sim' ? 'selected' : '') }}>Sim
                                            </option>
                                            <option value="Nao" {{ old('tem_gas') == 'Nao' ? 'selected' : ($condominio->tem_gas == 'Nao' ? 'selected' : '') }}>Não
                                            </option>
                                        </select>
                                        @if( $errors->has('tem_gas') )
                                            <span style="color: #f56954">{{ $errors->get('tem_gas')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ValorGas" class="control-label" @if($errors->has('valor_gas')) style="color: #f56954" @endif>Valor do gás (R$)</label>
                                        <input id="ValorGas" type="text" class="form-control pula" name="valor_gas" @if($errors->has('valor_gas')) style="border:1px solid #f56954" @endif
                                               value="{{ old('valor_gas') ? old('valor_gas') : $condominio->valor_gas_view }}">
                                        @if( $errors->has('valor_gas') )
                                            <span style="color: #f56954">{{ $errors->get('valor_gas')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SindicoCOD" class="control-label" @if($errors->has('sindico_id')) style="color: #f56954" @endif>Síndico</label>
                                        <select name="sindico_id" id="SindicoCOD" class="form-control select2 pula" @if($errors->has('sindico_id')) style="border:1px solid #f56954" @endif>
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($sindicos as $sindico)
                                                <option value="{{ $sindico->id }}" {{ old('sindico_id') == $sindico->id ? 'selected' : ($sindico->id == $condominio->sindico_id ? 'selected' : '') }}>
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
                                        <input id="email" type="email" class="form-control pula" name="email" @if($errors->has('email')) style="border:1px solid #f56954" @endif
                                               value="{{ old('email') ? old('email') : $condominio->email }}">
                                        @if( $errors->has('email') )
                                            <span style="color: #f56954">{{ $errors->get('email')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Endereço</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="CEP" class="control-label" @if($errors->has('cep')) style="color: #f56954" @endif>CEP</label>
                                                        <input type="text" id="CEP" name="cep" class="form-control pula"
                                                               data-mask="99999-999" value="{{ old('cep') ? old('cep') : $condominio->endereco->cep }}" @if($errors->has('cep')) style="border:1px solid #f56954" @endif>
                                                        @if( $errors->has('cep') )
                                                            <span style="color: #f56954">{{ $errors->get('cep')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="Logradouro" class="control-label" @if($errors->has('logradouro')) style="color: #f56954" @endif>Logradouro</label>
                                                        <input id="Logradouro" type="text" class="form-control pula" name="logradouro" @if($errors->has('logradouro')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('logradouro') ? old('logradouro') : $condominio->endereco->logradouro }}">
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
                                                        <input type="text" id="Numero" name="numero" class="form-control pula" @if($errors->has('numero')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('numero') ? old('numero') : $condominio->endereco->numero }}">
                                                        @if( $errors->has('numero') )
                                                            <span style="color: #f56954">{{ $errors->get('numero')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="Complemento" class="control-label" @if($errors->has('complemento')) style="color: #f56954" @endif>Complemento</label>
                                                        <input type="text" id="Complemento" name="complemento" class="form-control pula" @if($errors->has('complemento')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('complemento') ? old('complemento') : ($condominio->endereco->complemento ? $condominio->endereco->complemento : '') }}">
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
                                                        <input type="text" id="Bairro" name="bairro" class="form-control pula" @if($errors->has('bairro')) style="border:1px solid #f56954" @endif
                                                               value="{{ old('bairro') ? old('bairro') : $condominio->endereco->bairro }}">
                                                        @if( $errors->has('bairro') )
                                                            <span style="color: #f56954">{{ $errors->get('bairro')[0] }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="CidadeCOD" class="control-label" @if($errors->has('cidade_id')) style="color: #f56954" @endif>Cidade</label>
                                                        <select name="cidade_id" id="CidadeCOD" class="form-control pula select2">
                                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                                            @foreach($cidades as $cidade)
                                                                <option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : ($cidade->id == $condominio->endereco->cidade->id ? 'selected' : '') }}>{{ $cidade->descricao }}
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @can("editar_condominio")
                                            <button class="btn btn-info" type="submit" id="salvar">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @endcan
                                        @can("deletar_condominio")
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

        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Taxas do condomínio
                            - <a href="{{ route('condominios.condominiostaxas.criar', ['idCondominio' => $condominio->id]) }}">
                                cadastrar taxas
                            </a></h3>
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
                                        <a href="{{ route('condominios.condominiostaxas.exibir', ['id' => $taxa->id, 'idCondominio' => $condominio->id]) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modal-danger-{{$taxa->id}}">
                                            <i class="fa fa-trash"></i></button>
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
                                                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                                                        <form method="POST" action="{{ route('condominios.condominiostaxas.excluir', ['id' => $taxa->id, 'idCondominio' => $condominio->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
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
@endsection
@section('js')
    <script src="{{ asset('js/mask/jquery.mask.min.js') }}"></script>
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
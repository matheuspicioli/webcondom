@extends('adminlte::page')
@section('title', 'Fornecedores - Criar')
@section('content_header')
    <h1>Cadastro <small>de fornecedores</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('entidades.fornecedores.listar') }}"><i class="fa fa-home"></i> Fornecedores</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar fornecedor
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('entidades.fornecedores.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_fornecedor")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar fornecedor</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('entidades.fornecedores.salvar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipo" class="control-label">Tipo pessoa</label>
                                        <select name="tipo" id="tipo" class="form-control pula">
                                            <option value="-1" selected disabled>-----SELECIONE-----</option>
                                            <option value="1" {{ old('tipo') == 1 ? 'selected' : '' }}>CPF</option>
                                            <option value="2" {{ old('tipo') == 2 ? 'selected' : '' }}>CNPJ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipo_fornecedor" class="control-label">Tipo</label>
                                        <select name="tipo_fornecedor" id="tipo_fornecedor" class="form-control pula">
                                            <option value="-1" selected disabled>-----SELECIONE-----</option>
                                            <option value="PECAS"
                                                    {{ old('tipo_fornecedor') ? old('tipo_fornecedor') : '' }}>
                                                PECAS
                                            </option>
                                            <option value="SERVICOS"
                                                    {{ old('tipo_fornecedor') ? old('tipo_fornecedor') : '' }}>
                                                SERVICOS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpf_cnpj" class="control-label"
                                               @if($errors->has('cpf_cnpj')) style="color: #f56954" @endif>CPF/CNPJ</label>
                                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control pula"
                                               @if($errors->has('cpf_cnpj')) style="border:1px solid #f56954" @endif
                                               value="{{ old('cpf_cnpj') ? old('cpf_cnpj') : '' }}">
                                        @if( $errors->has('cpf_cnpj') )
                                            <span style="color: #f56954">{{ $errors->get('cpf_cnpj')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nome" class="control-label"
                                               @if($errors->has('nome')) style="color: #f56954" @endif>Nome</label>
                                        <input type="text" name="nome" id="nome" class="form-control pula"
                                               @if($errors->has('nome')) style="border:1px solid #f56954" @endif
                                               value="{{ old('nome') ? old('nome') : '' }}">
                                        @if( $errors->has('nome') )
                                            <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="apelido" class="control-label"
                                               @if($errors->has('apelido')) style="color: #f56954" @endif>Apelido</label>
                                        <input type="text" name="apelido" id="apelido" class="form-control pula"
                                               @if($errors->has('apelido')) style="border:1px solid #f56954" @endif
                                               value="{{ old('apelido') ? old('apelido') : '' }}">
                                        @if( $errors->has('apelido') )
                                            <span style="color: #f56954">{{ $errors->get('apelido')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rg_ie" class="control-label"
                                               @if($errors->has('rg_ie')) style="color: #f56954" @endif>RGIE</label>
                                        <input type="text" name="rg_ie" id="rg_ie" class="form-control pula"
                                               @if($errors->has('rg_ie')) style="border:1px solid #f56954" @endif
                                               value="{{ old('rg_ie') ? old('rg_ie') : '' }}">
                                        @if( $errors->has('rg_ie') )
                                            <span style="color: #f56954">{{ $errors->get('rg_ie')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="codigo" class="control-label"
                                               @if($errors->has('codigo')) style="color: #f56954" @endif>Código</label>
                                        <input type="text" name="codigo" id="codigo" class="form-control pula"
                                               @if($errors->has('codigo')) style="border:1px solid #f56954" @endif
                                               value="{{ old('codigo') ? old('codigo') : '' }}">
                                        @if( $errors->has('codigo') )
                                            <span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="fantasia" class="control-label cnpj"
                                               @if($errors->has('fantasia')) style="color: #f56954" @endif>Fantasia</label>
                                        <label for="fantasia" class="control-label cnpj"></label>
                                        <input type="text" name="fantasia" id="fantasia" class="form-control cnpj pula"
                                               @if($errors->has('fantasia')) style="border:1px solid #f56954" @endif
                                               value="{{ old('fantasia') ? old('fantasia') : '' }}">
                                        @if( $errors->has('fantasia') )
                                            <span style="color: #f56954">{{ $errors->get('fantasia')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inscricao_municipal" class="control-label cnpj"
                                               @if($errors->has('inscricao_municipal')) style="color: #f56954" @endif>Inscrição
                                            municipal</label>
                                        <input type="text" name="inscricao_municipal" id="inscricao_municipal"
                                               class="form-control cnpj pula"
                                               @if($errors->has('inscricao_municipal')) style="border:1px solid #f56954"
                                               @endif
                                               value="{{ old('inscricao_municipal') ? old('inscricao_municipal') : '' }}">
                                        @if( $errors->has('inscricao_municipal') )
                                            <span style="color: #f56954">{{ $errors->get('inscricao_municipal')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="ramo_atividade" class="control-label cnpj"
                                               @if($errors->has('ramo_atividade')) style="color: #f56954" @endif>Ramo
                                            Atividade</label>
                                        <input type="text" name="ramo_atividade" id="ramo_atividade"
                                               class="form-control cnpj pula"
                                               @if($errors->has('ramo_atividade')) style="border:1px solid #f56954"
                                               @endif
                                               value="{{ old('ramo_atividade') ? old('ramo_atividade') : '' }}">
                                        @if( $errors->has('ramo_atividade') )
                                            <span style="color: #f56954">{{ $errors->get('ramo_atividade')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="data_abertura" class="control-label cnpj"
                                               @if($errors->has('data_abertura')) style="color: #f56954" @endif>Data
                                            abertura</label>
                                        <input type="date" name="data_abertura" id="data_abertura"
                                               class="form-control cnpj pula"
                                               @if($errors->has('data_abertura')) style="border:1px solid #f56954"
                                               @endif
                                               value="{{ old('data_abertura') ? old('data_abertura') : '' }}">
                                        @if( $errors->has('data_abertura') )
                                            <span style="color: #f56954">{{ $errors->get('data_abertura')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome_mae" class="control-label cpf"
                                               @if($errors->has('nome_mae')) style="color: #f56954" @endif>Nome da
                                            mãe</label>
                                        <input type="text" name="nome_mae" id="nome_mae" class="form-control cpf pula"
                                               @if($errors->has('nome_mae')) style="border:1px solid #f56954" @endif
                                               value="{{ old('nome_mae') ? old('nome_mae') : '' }}">
                                        @if( $errors->has('nome_mae') )
                                            <span style="color: #f56954">{{ $errors->get('nome_mae')[0] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="estado_civil_id" class="control-label cpf">Estado civil</label>
                                        <select name="estado_civil_id" id="estado_civil_id" class="form-control cpf pula">
                                            <option value="-1" selected disabled>-----SELECIONE-----</option>
                                            @foreach($estados_civis as $estados_civil)
                                                <option value="{{ $estados_civil->id }}">{{ $estados_civil->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="regime_casamento_id" class="control-label cpf">Regime casamento</label>
                                        <select name="regime_casamento_id" id="regime_casamento_id" class="form-control cpf pula">
                                            <option value="-1" selected disabled>-----SELECIONE-----</option>
                                            @foreach($regimes_casamentos as $regime_casamento)
                                                <option value="{{ $regime_casamento->id }}">{{ $regime_casamento->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="profissao" class="control-label cpf">Profissão</label>
                                        <input type="text" name="profissao" id="profissao" class="form-control cpf pula">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="data_nascimento" class="control-label cpf">Data de nascimento</label>
                                        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control cpf pula">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nacionalidade" class="control-label cpf">Nacionalidade</label>
                                        <input type="text" name="nacionalidade" id="nacionalidade" class="form-control cpf pula">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="empresa" class="control-label cpf">Empresa</label>
                                        <input type="text" name="empresa" id="empresa" class="form-control cpf pula">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inss" class="control-label cpf">INSS</label>
                                        <input type="text" name="inss" id="inss" class="form-control cpf pula">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="dependentes" class="control-label cpf">Dependentes</label>
                                        <input type="number" name="dependentes" id="dependentes" class="form-control cpf pula">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefone_principal" class="control-label">Telefone principal</label>
                                        <input type="text" name="telefone_principal" id="telefone_principal" class="form-control pula">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefone_comercial" class="control-label">Telefone comercial</label>
                                        <input type="text" name="telefone_comercial" id="telefone_comercial" class="form-control pula">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="celular_1" class="control-label">Celular 1</label>
                                        <input type="text" name="celular_1" id="celular_1" class="form-control pula">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="celular_2" class="control-label">Celular 2</label>
                                        <input type="text" name="celular_2" id="celular_2" class="form-control pula">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site" class="control-label">Site</label>
                                        <input type="text" name="site" id="site" class="form-control pula">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label">E-mail</label>
                                        <input type="email" name="email" id="email" class="form-control pula">
                                    </div>
                                </div>
                            </div>
                            <!-- ENDEREÇO PRINCIPAL-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Endereço Principal</h3>
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
                                                    <label for="Complemento" class="control-label" @if($errors->has('complemento')) style="color: #f56954" @endif>Complemento</label>
                                                    <input id="Complemento" type="text" class="form-control pula" name="complemento" value="{{ old('complemento') }}" @if($errors->has('complemento')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('complemento') )
                                                        <span style="color: #f56954">{{ $errors->get('complemento')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Bairro" class="control-label" @if($errors->has('bairro')) style="color: #f56954" @endif>Bairro</label>
                                                        <input id="Bairro" type="text" class="form-control pula" name="bairro" value="{{ old('complemento') }}" @if($errors->has('bairro')) style="border:1px solid #f56954" @endif>
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
            $('.select2').select2();
            $("#tipo").focus();

            $(".cnpj").hide();

            $("select[id=tipo]").on('change', function () {
                if ($("select[id=tipo]").val() == 2) {
                    $(".cnpj").show();
                    $(".cpf").hide();
                } else {
                    $(".cnpj").hide();
                    $(".cpf").show();
                }
            });
        });
    </script>
@endsection
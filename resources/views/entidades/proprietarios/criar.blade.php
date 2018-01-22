@extends('adminlte::page')
@section('titulo', 'Proprietários - Criar')
@section('content_header')
    <h1>Cadastro <small>de proprietários</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('entidades.proprietarios.listar') }}"><i class="fa fa-home"></i> Proprietários</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar proprietário
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('entidades.proprietarios.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar proprietário</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('entidades.proprietarios.salvar') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Descricao" class="control-label">Tipo pessoa</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="-1" selected disabled>-----SELECIONE-----</option>
                                        <option value="CPF">CPF</option>
                                        <option value="CNPJ">CNPJ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf_cnpj" class="control-label">CPF/CNPJ</label>
                                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nome" class="control-label">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apelido" class="control-label">Apelido</label>
                                    <input type="text" name="apelido" id="apelido" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rg_ie" class="control-label">RGIE</label>
                                    <input type="text" name="rg_ie" id="rg_ie" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="codigo" class="control-label">Código</label>
                                    <input type="text" name="codigo" id="codigo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="fantasia" class="control-label cnpj">Fantasia</label>
                                    <input type="text" name="fantasia" id="fantasia" class="form-control cnpj">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inscricao_municipal" class="control-label cnpj">Inscrição municipal</label>
                                    <input type="text" name="inscricao_municipal" id="inscricao_municipal" class="form-control cnpj">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="ramo_atividade" class="control-label cnpj">Ramo Atividade</label>
                                    <input type="text" name="ramo_atividade" id="ramo_atividade" class="form-control cnpj">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_abertura" class="control-label cnpj">Data abertura</label>
                                    <input type="date" name="data_abertura" id="data_abertura" class="form-control cnpj">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome_mae" class="control-label cpf">Nome da mãe</label>
                                    <input type="text" name="nome_mae" id="nome_mae" class="form-control cpf">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado_civil_id" class="control-label cpf">Estado civil</label>
                                    <select name="estado_civil_id" id="estado_civil_id" class="form-control cpf">
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
                                    <select name="regime_casamento_id" id="regime_casamento_id" class="form-control cpf">
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
                                    <input type="text" name="profissao" id="profissao" class="form-control cpf">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_nascimento" class="control-label cpf">Data de nascimento</label>
                                    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control cpf">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nacionalidade" class="control-label cpf">Nacionalidade</label>
                                    <input type="text" name="nacionalidade" id="nacionalidade" class="form-control cpf">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="empresa" class="control-label cpf">Empresa</label>
                                    <input type="text" name="empresa" id="empresa" class="form-control cpf">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inss" class="control-label cpf">INSS</label>
                                    <input type="text" name="inss" id="inss" class="form-control cpf">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="dependentes" class="control-label cpf">Dependentes</label>
                                    <input type="number" name="dependentes" id="dependentes" class="form-control cpf">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefone_principal" class="control-label">Telefone principal</label>
                                    <input type="text" name="telefone_principal" id="telefone_principal" class="form-control">
                                    <span class="help-block">Este campo é opcional</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefone_comercial" class="control-label">Telefone comercial</label>
                                    <input type="text" name="telefone_comercial" id="telefone_comercial" class="form-control">
                                    <span class="help-block">Este campo é opcional</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="celular_1" class="control-label">Celular 1</label>
                                    <input type="text" name="celular_1" id="celular_1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="celular_2" class="control-label">Celular 2</label>
                                    <input type="text" name="celular_2" id="celular_2" class="form-control">
                                    <span class="help-block">Este campo é opcional</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site" class="control-label">Site</label>
                                    <input type="text" name="site" id="site" class="form-control">
                                    <span class="help-block">Este campo é opcional</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    <span class="help-block">Este campo é opcional</span>
                                </div>
                            </div>
                        </div>
                        <hr>
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
                                                <label for="cep" class="control-label">CEP</label>
                                                <input type="text" id="cep" name="cep_principal" class="form-control pula">
                                                <span class="help-block">Apenas os números</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="logradouro" class="control-label">Logradouro</label>
                                                <input id="logradouro" type="text" class="form-control pula" name="logradouro_principal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="numero" class="control-label">Número</label>
                                                <input type="number" min="0" id="numero" name="numero_principal" class="form-control pula">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="complemento" class="control-label">Complemento</label>
                                                <input type="text" id="complemento" name="complemento_principal" class="form-control pula">
                                                <span class="help-block">Este campo é opcional</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bairro" class="control-label">Bairro</label>
                                                <input type="text" id="bairro" name="bairro_principal" class="form-control pula">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cidade_id_principal" class="control-label">Cidade</label>
                                                <select name="cidade_id_principal" id="cidade_id_principal" class="form-control pula">
                                                    <option selected disabled>-------Selecione uma cidade-------</option>
                                                    @foreach($cidades as $cidade)
                                                        <option value="{{ $cidade->id }}">{{ $cidade->descricao }}
                                                            - {{ $cidade->estado->descricao }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ENDEREÇO COBRANÇA-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-warning box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Endereço Cobrança</h3>
                                    </div>
                                    <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cep" class="control-label">CEP</label>
                                                <input type="text" id="cep" name="cep_cobranca" class="form-control pula">
                                                <span class="help-block">Apenas os números</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="logradouro" class="control-label">Logradouro</label>
                                                <input id="logradouro" type="text" class="form-control pula" name="logradouro_cobranca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="numero" class="control-label">Número</label>
                                                <input type="number" min="0" id="numero" name="numero_cobranca" class="form-control pula">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="complemento" class="control-label">Complemento</label>
                                                <input type="text" id="complemento" name="complemento_cobranca" class="form-control pula">
                                                <span class="help-block">Este campo é opcional</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bairro" class="control-label">Bairro</label>
                                                <input type="text" id="bairro" name="bairro_cobranca" class="form-control pula">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cidade_id_cobranca" class="control-label">Cidade</label>
                                                <select name="cidade_id_cobranca" id="cidade_id_cobranca" class="form-control pula">
                                                    <option selected disabled>-------Selecione uma cidade-------</option>
                                                    @foreach($cidades as $cidade)
                                                        <option value="{{ $cidade->id }}">{{ $cidade->descricao }}
                                                            - {{ $cidade->estado->descricao }}</option>
                                                    @endforeach
                                                </select>
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
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $("#tipo").focus();

            $(".cnpj").hide();

            $("select[id=tipo]").on('change', function () {
                if ($("select[id=tipo]").val() == 'CNPJ') {
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
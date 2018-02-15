@extends('adminlte::page')
@section('titulo', 'Empresas - Exibir/Alterar')
@section('titulo', 'Proprietários - Exibir/Alterar')
@section('content_header')
    <h1>Empresas - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('entidades.empresas.listar') }}"><i class="fa fa-home"></i> Empresas</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Empresa
        </li>
    </ol>
@stop
@section('content')
    @can("exibir_empresa")
        <div class="row">
            <div class="col-md-1">
                <a href="{{ route('entidades.empresas.listar') }}" class="btn btn-default">
                    <i class="fa fa-rotate-left"></i> Voltar</a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Empresa</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ route('entidades.empresas.alterar', ['id' => $empresa->id ]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cpf_cnpj" class="control-label">CPF/CNPJ</label>
                                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control pula"
                                               value="{{ $empresa->entidade->cpf_cnpj }}">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="nome" class="control-label cnpj">Razão social</label>
                                        <input type="text" name="nome" id="nome"
                                               class="form-control cnpj pula" value="{{ $empresa->entidade->nome }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rg_ie" class="control-label cnpj">Inscrição estadual</label>
                                        <input type="text" name="rg_ie" id="rg_ie"
                                               class="form-control cnpj pula" value="{{ $empresa->entidade->rg_ie }}">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="fantasia" class="control-label cnpj">Fantasia</label>
                                        <input type="text" name="fantasia" id="fantasia" class="form-control cnpj pula"
                                               value="{{ $empresa->entidade->fantasia }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="creci" class="control-label">Creci</label>
                                        <input type="text" name="creci" id="creci" class="form-control pula"
                                               value="{{ $empresa->creci }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ramo_atividade" class="control-label cnpj">Ramo Atividade</label>
                                        <input type="text" name="ramo_atividade" id="ramo_atividade"
                                               class="form-control cnpj pula" value="{{ $empresa->entidade->ramo_atividade }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inscricao_municipal" class="control-label cnpj">Inscrição municipal</label>
                                        <input type="text" name="inscricao_municipal" id="inscricao_municipal"
                                               class="form-control cnpj pula" value="{{ $empresa->entidade->inscricao_municipal }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="data_abertura" class="control-label cnpj">Data abertura</label>
                                        <input type="date" name="data_abertura" id="data_abertura"
                                               class="form-control cnpj pula" value="{{ $empresa->entidade->data_abertura }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefone_principal" class="control-label">Telefone principal</label>
                                        <input type="text" name="telefone_principal" id="telefone_principal"
                                               class="form-control pula" value="{{ $empresa->entidade->telefone_principal }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefone_comercial" class="control-label">Telefone comercial</label>
                                        <input type="text" name="telefone_comercial"
                                               id="telefone_comercial" class="form-control pula"
                                               value="{{ $empresa->entidade->telefone_comercial }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="celular_1" class="control-label">Celular 1</label>
                                        <input type="text" name="celular_1" id="celular_1"
                                               class="form-control pula" value="{{ $empresa->entidade->celular_1 }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="celular_2" class="control-label">Celular 2</label>
                                        <input type="text" name="celular_2" id="celular_2"
                                               class="form-control pula" value="{{ $empresa->entidade->celular_2 }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label">E-mail</label>
                                        <input type="email" name="email" id="email"
                                               class="form-control pula" value="{{ $empresa->entidade->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_nfe" class="control-label">E-mail NFE</label>
                                        <input type="email" name="email_nfe" id="email_nfe"
                                               class="form-control pula" value="{{ $empresa->email_nfe }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site" class="control-label">Site</label>
                                        <input type="text" name="site" id="site"
                                               class="form-control pula" value="{{ $empresa->entidade->site }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo" class="control-label">Logo</label>
                                        <input type="file" name="logo_imagem" id="logo" class="pula" value="$empresa->logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ Storage::url($empresa->logo) }}" alt="Não há logo" height="100px">
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
                                                        <label for="cep" class="control-label">CEP</label>
                                                        <input type="text" id="cep" name="cep"
                                                               class="form-control pula"
                                                               value="{{ $empresa->entidade->endereco_principal->cep }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="logradouro" class="control-label">Logradouro</label>
                                                        <input id="logradouro" type="text" class="form-control pula"
                                                               name="logradouro"
                                                               value="{{ $empresa->entidade->endereco_principal->logradouro }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="numero" class="control-label">Número</label>
                                                        <input type="text" id="numero" name="numero"
                                                               class="form-control pula"
                                                               value="{{ $empresa->entidade->endereco_principal->numero }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="complemento" class="control-label">Complemento</label>
                                                        <input type="text" id="complemento" name="complemento"
                                                               class="form-control pula"
                                                               value="{{ $empresa->entidade->endereco_principal->complemento }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="bairro" class="control-label">Bairro</label>
                                                        <input type="text" id="bairro" name="bairro"
                                                               class="form-control pula"
                                                               value="{{ $empresa->entidade->endereco_principal->bairro }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="cidade_id_principal" class="control-label">Cidade</label>
                                                        <select name="cidade_id" id="cidade_id_principal" class="form-control pula">
                                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                                            @foreach($cidades as $cidade)
                                                                <option value="{{ $cidade->id }}" {{ $empresa->entidade->endereco_principal->cidade_id == $cidade->id ? 'selected' : '' }}>
                                                                    {{ $cidade->descricao }} - {{ $cidade->estado->descricao }}
                                                                </option>
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
                                        @can("editar_empresa")
                                            <button class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @else
                                            <button disabled class="btn btn-info" type="submit">
                                                <i class="fa fa-save"></i> Salvar</button>
                                        @endcan
                                        @can("deletar_empresa")
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
        <!-- MODAL EXCLUIR EMPRESA -->
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
                        <h4>Deseja realmente excluir a Empresa"{{ $empresa->nome }}"?</h4>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                        <form method="POST" action="{{ route('entidades.empresas.excluir', ['id' => $empresa->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-outline" type="submit">Confirmar exclusão</button>
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
            $('#tipo').focus();
        });
    </script>
@endsection

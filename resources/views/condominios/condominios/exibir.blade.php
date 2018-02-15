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
                        <form method="POST" action="{{ route('condominios.condominios.alterar', ['id' => $condominio->id ]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nome" class="control-label">Nome</label>
                                        <input id="Nome" type="text" class="form-control pula" name="nome"
                                               value="{{ $condominio->nome }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apelido" class="control-label">Apelido</label>
                                        <input id="Apelido" type="text" class="form-control pula" name="apelido"
                                               value="{{ $condominio->apelido }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Telefone" class="control-label">Telefone</label>
                                        <input id="Telefone" type="text" class="form-control pula" name="telefone"
                                               value="{{ $condominio->telefone ? $condominio->telefone : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Celular" class="control-label">Celular</label>
                                        <input id="Celular" type="text" class="form-control pula" name="celular"
                                               value="{{ $condominio->celular }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Unidades" class="control-label">Unidades</label>
                                        <input id="Unidades" type="number" min="0" class="form-control pula" name="unidades"
                                               value="{{ $condominio->unidades }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="TemGas" class="control-label">Tem gás?</label>
                                        <select name="tem_gas" id="TemGas" class="form-control pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            <option value="1" {{ $condominio->tem_gas == 1 ? 'selected' : '' }}>Sim
                                            </option>
                                            <option value="0" {{ $condominio->tem_gas == 0 ? 'selected' : '' }}>Não
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ValorGas" class="control-label">Valor do gás</label>
                                        <input id="ValorGas" type="text" class="form-control pula" name="valor_gas"
                                               placeholder="150,00"
                                               value="{{ $condominio->valor_gas }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SindicoCOD" class="control-label">Síndico</label>
                                        <select name="sindico_id" id="SindicoCOD" tabindex="-1" aria-hidden="true" class="form-control select2 pula">
                                            <option disabled selected>----------Selecione----------</option>
                                            @foreach($sindicos as $sindico)
                                                <option value="{{ $sindico->id }}" {{ $sindico->id == $condominio->sindico_id ? 'selected' : '' }}>
                                                    {{ $sindico->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input id="email" type="email" class="form-control pula" name="email"
                                               value="{{ $condominio->email }}">
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
                                                        <label for="CEP" class="control-label">CEP</label>
                                                        <input type="text" id="CEP" name="cep" class="form-control pula" value="{{ $condominio->endereco->cep }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="Logradouro" class="control-label">Logradouro</label>
                                                        <input id="Logradouro" type="text" class="form-control pula" name="logradouro"
                                                               value="{{ $condominio->endereco->logradouro }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="Numero" class="control-label">Número</label>
                                                        <input type="text" id="Numero" name="numero" class="form-control pula"
                                                               value="{{ $condominio->endereco->numero }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="Complemento" class="control-label">Complemento</label>
                                                        <input type="text" id="Complemento" name="complemento" class="form-control pula"
                                                               value="{{ $condominio->endereco->complemento ? $condominio->endereco->complemento : '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Bairro" class="control-label">Bairro</label>
                                                        <input type="text" id="Bairro" name="bairro" class="form-control pula"
                                                               value="{{ $condominio->endereco->bairro }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="CidadeCOD" class="control-label">Cidade</label>
                                                        <select name="cidade_id" id="CidadeCOD" class="form-control pula select2">
                                                            <option selected disabled>-------Selecione uma cidade-------</option>
                                                            @foreach($cidades as $cidade)
                                                                <option value="{{ $cidade->id }}" {{ $cidade->id == $condominio->endereco->cidade->id ? 'selected' : '' }}>{{ $cidade->descricao }}
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
                                        @can("editar_condominio")
                                            <button class="btn btn-info" type="submit">
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
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#Nome').focus();
            if ($("select[id=TemGas]").val() != 1)
                $("#ValorGas").prop("disabled", true);
            else
                $("#ValorGas").prop("disabled", false);
            $("select[id=TemGas]").on('change', function () {
                if ($("select[id=TemGas]").val() != 1)
                    $("#ValorGas").prop("disabled", true);
                else
                    $("#ValorGas").prop("disabled", false);
            });
        });
    </script>
@endsection
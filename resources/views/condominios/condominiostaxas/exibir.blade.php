@extends('adminlte::page')
@section('titulo', 'Taxa de condomínios - Exibir/Alterar')
@section('content_header')
    <h1>Taxas de Condomínios - <small>edição</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('condominios.condominios.listar') }}"><i class="fa fa-home"></i> Taxas de Condomínios</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> Editar Taxa de Condomínio
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.condominios.exibir', ['id' => $idCondominio ]) }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
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
                    <form method="POST" action="{{ route('condominios.condominiostaxas.alterar', ['id' => $taxa->id, 'idCondominio' => $idCondominio]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Descricao" class="control-label" @if($errors->has('descricao')) style="color: #f56954" @endif>Descrição</label>
                                    <input id="Descricao" type="text" class="form-control pula" name="descricao" @if($errors->has('descricao')) style="border:1px solid #f56954" @endif
                                           value="{{ old('descricao') ? old('descricao') : $taxa->descricao }}">
                                    @if( $errors->has('descricao') )
                                        <span style="color: #f56954">{{ $errors->get('descricao')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Valor" class="control-label" @if($errors->has('valor')) style="color: #f56954" @endif>Valor</label>
                                    <input id="Valor" type="text" class="form-control pula" name="valor" @if($errors->has('valor')) style="border:1px solid #f56954" @endif
                                           value="{{ old('valor') ? old('valor') : $taxa->valor }}">
                                    @if( $errors->has('valor') )
                                        <span style="color: #f56954">{{ $errors->get('valor')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-save"></i> Salvar</button>
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-excluir">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EXCLUIR TAXA GERANDO DINÂMICO -->
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
                    <h4>Deseja realmente excluir a taxa "{{ $taxa->descricao }}"?</h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Fechar</button>
                    <form method="POST" action="{{ route('condominios.condominiostaxas.excluir', ['id' => $taxa->id, 'idCondominio' => $idCondominio]) }}">
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
            $('#Descricao').focus();
        });
    </script>
@endsection

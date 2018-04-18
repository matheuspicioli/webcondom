@extends('adminlte::page')
@section('title', 'Empresas - Lista')
@section('content_header')
    <h1>Empresas - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Empresas
        </li>
    </ol>
@stop

@section('content')
    @can("listar_empresa")
        <div class="row">
            <div class="col-md-1">
                @can("incluir_empresa")
                    <a href="{{ route('entidades.empresas.criar') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Cadastrar</a>
                @else
                    <button disabled type="button" class="btn btn-success">
                        <i class="fa fa-plus"></i> Cadastrar</button>
                @endcan
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Empresa</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Fantasia</th>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Fantasia</th>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>
                                    <td>{{ $empresa->entidade->fantasia }}</td>
                                    <td>{{ $empresa->entidade->nome }}</td>
                                    <td @if($empresa->entidade->tipo == "CPF") data-mask="999.999.999-99" @else data-mask="99.999.999/9999-99" @endif >{{ $empresa->entidade->cpf_cnpj }}</td>
                                    <!-- <td><img src="{{ Storage::url($empresa->logo) }}" alt="Logo" width="90px" height="50px"></td> -->
                                    <td>
                                        @can("exibir_empresa")
                                            <a class="btn btn-sm btn-warning" href="{{ route('entidades.empresas.exibir', ['id' => $empresa->id ]) }}">
                                                <i class="fa fa-pencil"></i></a>
                                        @else
                                            <button disabled type="button" class="btn btn-sm btn-warning">
                                                <i class="fa fa-pencil"></i></button>
                                        @endcan

                                        @can("deletar_empresa")
                                            <button type="button" data-toggle="modal" data-target="#modal-danger-{{$empresa->id}}" href="#" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @else
                                            <button disabled type="button" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan

                                        <!-- MODAL EXCLUSÃO -->
                                        <div id="modal-danger-{{$empresa->id}}" class="modal modal-danger fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h3 class="modal-title">Confirmar exclusão</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja realmente excluir a Empresa "{{ $empresa->entidade->nome }}"?</h4>
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
@endsection
@section('js')
    <script>
        $(function () {
            $('#tabela').DataTable({
                "order": [[ 2, "asc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
@stop

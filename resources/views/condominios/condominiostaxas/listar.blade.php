@extends('adminlte::page')
@section('titulo', 'Taxa de condomínios - Lista')
@section('content_header')
    <h1>Taxas de Condomínios - <small>listagem</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">
            <i class="fa fa-home"></i> Taxa de Condomínio
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('condominios.condominiostaxas.criar',['idCondominio' => $idCondominio]) }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cadastrar</a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Taxas de Condomínios</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-hover dataTable" id="tabela" role="grid">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($taxas as $taxa)
                            <tr>
                                <td>{{ $taxa->id }}</td>
                                <td>{{ $taxa->descricao }}</td>
                                <td>{{ $taxa->valor }}</td>
                                <td>
                                    <a href="{{ route('condominios.condominiostaxas.exibir', ['id' => $taxa->id, 'idCondominio' => $idCondominio]) }}"
                                       class="btn btn-success">
                                        <i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-danger-{{$taxa->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
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
                                                    <form method="POST" action="{{ route('condominios.condominiostaxas.excluir', ['id' => $taxa->id, 'idCondominio' => $idCondominio]) }}">
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
@endsection
@section('js')
    <script>
        $(function () {
            $('#tabela').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                }
            } )
        });
    </script>
@stop
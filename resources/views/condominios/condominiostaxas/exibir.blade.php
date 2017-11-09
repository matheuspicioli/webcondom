@extends('layouts.app')
@section('titulo', 'Taxa de condomínios - Exibir/Alterar')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Alterar taxa de condomínio</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                    @foreach($condominios as $condominio)
                                        @if($condominio->id == $taxa->condominio_id)
                                            @php $idCondominio = $condominio->id; @endphp
                                        @endif
                                    @endforeach
                                <h4><a href="{{ route('condominios.condominiostaxas.listar', ['idCondominio' => $idCondominio]) }}">Voltar</a></h4>
                                <hr>
                            </div>
                        </div>
                        <form method="post"
                              action="{{ route('condominios.condominiostaxas.alterar', ['id' => $taxa->id ]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="idCondominio" value="{{ $idCondominio }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Descricao" class="control-label">Descrição</label>
                                        <input id="Descricao" type="text" class="form-control" name="descricao" value="{{ $taxa->descricao }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Valor" class="control-label">Valor</label>
                                        <input id="Valor" type="text" class="form-control" name="valor" value="{{ $taxa->valor }}">
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Alterar</button>
                                        <button class="btn btn-danger">
                                            <a style="color: #FFFFFF"
                                               href="{{ route('condominios.condominiostaxas.excluir', ['id' => $taxa->id ]) }}">Excluir!</a>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
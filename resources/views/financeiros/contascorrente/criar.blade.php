@extends('adminlte::page')
@section('title', 'Contas corrente - Cadastrar')
@section('content_header')
    <h1>Cadastro <small>de contas correntes</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('financeiros.contascorrente.listar') }}"><i class="fa fa-group"></i> Contas corrente</a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Cadastrar conta corrente
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('financeiros.contascorrente.listar') }}" class="btn btn-default">
                <i class="fa fa-rotate-left"></i> Voltar</a>
            <hr>
        </div>
    </div>
    @can("incluir_contacorrente")
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrar conta corrente</h3>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('financeiros.contascorrente.salvar') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="condominio" class="control-label" clas="control-label" @if($errors->has('condominio_id')) style="color: #f56954" @endif>Condomínio</label>
                                    <select name="condominio_id" id="condominio" class="form-control select2" @if($errors->has('condominio_id')) style="border:1px solid #f56954" @endif>
                                        <option disabled selected>----------Selecione----------</option>
                                        @foreach($condominiosDados as $condominio)
                                            <option value="{{ $condominio->id }}" {{ old('condominio_id') == $condominio->id ? 'selected' : '' }}>
                                                {{ $condominio->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if( $errors->has('condominio_id') )
                                        <span style="color: #f56954">{{ $errors->get('condominio_id')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="codigo" class="control-label" @if($errors->has('codigo')) style="border:1px solid #f56954" @endif>Código</label>
                                    <input id="codigo" type="text" class="form-control pula" name="codigo"
                                           data-mask="999999" value="{{ old('codigo') }}" @if($errors->has('codigo')) style="border:1px solid #f56954" @endif>
                                    @if( $errors->has('codigo') )
                                        <span style="color: #f56954">{{ $errors->get('codigo')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="banco" class="control-label" @if($errors->has('banco_id')) style="border:1px solid #f56954" @endif>Banco</label>
                                    <select name="banco_id" class="form-control select2" id="banco"@if($errors->has('banco_id')) style="border:1px solid #f56954" @endif>
                                        <option disabled selected>----------Selecione----------</option>
                                        @foreach($bancosDados as $banco)
                                            <option value="{{ $banco->id }}" {{ old('banco_id') == $banco->id ? 'selected' : '' }}>
                                                {{ $banco->nome_banco }} - {{ $banco->CNAB }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if( $errors->has('banco_id') )
                                        <span style="color: #f56954">{{ $errors->get('banco_id')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="agencia" class="control-label" @if($errors->has('agencia')) style="border:1px solid #f56954" @endif>Agência</label>
                                    <input id="agencia" type="text" class="form-control pula" name="agencia" value="{{ old('agencia') }}" @if($errors->has('agencia')) style="border:1px solid #f56954" @endif>
                                    @if( $errors->has('agencia') )
                                        <span style="color: #f56954">{{ $errors->get('agencia')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="conta" class="control-label" @if($errors->has('conta')) style="border:1px solid #f56954" @endif>Conta</label>
                                    <input id="conta" type="text" class="form-control pula" name="conta" value="{{ old('conta') }}" @if($errors->has('conta')) style="border:1px solid #f56954" @endif>
                                    @if( $errors->has('conta') )
                                        <span style="color: #f56954">{{ $errors->get('conta')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="inicio" class="control-label" @if($errors->has('inicio')) style="border:1px solid #f56954" @endif>Inicio</label>
                                    <input id="inicio" type="date" class="form-control pula" name="inicio" value="{{ old('inicio') }}" @if($errors->has('inicio')) style="border:1px solid #f56954" @endif>
                                    @if( $errors->has('inicio') )
                                        <span style="color: #f56954">{{ $errors->get('inicio')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="checkbox">
                                    <label for="principal">
                                        <input type="checkbox" name="principal" id="principal"
                                               value="{{ old('principal') ? "checked" : '' }}" @if($errors->has('principal')) style="border:1px solid #f56954" @endif> Principal?
                                    </label>
                                    @if( $errors->has('principal') )
                                        <span style="color: #f56954">{{ $errors->get('principal')[0] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Dados para boleto</h3>
                                    </div>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nome" class="control-label" @if($errors->has('nome')) style="border:1px solid #f56954" @endif>Nome</label>
                                                    <input id="nome" type="text" class="form-control pula" name="nome" value="{{ old('nome') }}" @if($errors->has('nome')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('nome') )
                                                        <span style="color: #f56954">{{ $errors->get('nome')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="boleto_agencia" class="control-label" @if($errors->has('boleto_agencia')) style="border:1px solid #f56954" @endif>Agência</label>
                                                    <input id="boleto_agencia" type="text" class="form-control pula" name="boleto_agencia" value="{{ old('boleto_agencia') }}" @if($errors->has('boleto_agencia')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('boleto_agencia') )
                                                        <span style="color: #f56954">{{ $errors->get('boleto_agencia')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="boleto_conta" class="control-label" @if($errors->has('boleto_conta')) style="border:1px solid #f56954" @endif>Conta</label>
                                                    <input id="boleto_conta" type="text" class="form-control pula" name="boleto_conta" value="{{ old('boleto_conta') }}" @if($errors->has('boleto_conta')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('boleto_conta') )
                                                        <span style="color: #f56954">{{ $errors->get('boleto_conta')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="cedente" class="control-label" @if($errors->has('cedente')) style="border:1px solid #f56954" @endif>Cedente</label>
                                                    <input id="cedente" type="text" class="form-control pula" name="cedente" value="{{ old('cedente') }}" @if($errors->has('cedente')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('cedente') )
                                                        <span style="color: #f56954">{{ $errors->get('cedente')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="carteira" class="control-label" @if($errors->has('carteira')) style="border:1px solid #f56954" @endif>Carteira</label>
                                                    <input id="carteira" type="text" class="form-control pula" name="carteira" value="{{ old('carteira') }}" @if($errors->has('carteira')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('carteira') )
                                                        <span style="color: #f56954">{{ $errors->get('carteira')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="nosso_numero" class="control-label" @if($errors->has('nosso_numero')) style="border:1px solid #f56954" @endif>Nosso número</label>
                                                    <input id="nosso_numero" type="text" class="form-control pula" name="nosso_numero" value="{{ old('nosso_numero') }}" @if($errors->has('nosso_numero')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('nosso_numero') )
                                                        <span style="color: #f56954">{{ $errors->get('nosso_numero')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="prazo_baixa" class="control-label" @if($errors->has('prazo_baixa')) style="border:1px solid #f56954" @endif>Prazo para baixa</label>
                                                    <input id="prazo_baixa" type="number" class="form-control pula" name="prazo_baixa" value="{{ old('prazo_baixa') }}" @if($errors->has('prazo_baixa')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('prazo_baixa') )
                                                        <span style="color: #f56954">{{ $errors->get('prazo_baixa')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="aceite" class="control-label" @if($errors->has('aceite')) style="border:1px solid #f56954" @endif>Aceite (S/N) </label>
                                                <select name="aceite" id="aceite" class="form-control pula" @if($errors->has('aceite')) style="border:1px solid #f56954" @endif>
                                                    <option disabled selected>Selecione</option>
                                                    <option value="1"  {{ old('aceite') == '1' ? 'selected' : '' }}>Sim</option>
                                                    <option value="0"  {{ old('aceite') == '0' ? 'selected' : '' }}>Não</option>
                                                </select>
                                                @if( $errors->has('aceite') )
                                                    <span style="color: #f56954">{{ $errors->get('aceite')[0] }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="multa" class="control-label" @if($errors->has('nulta')) style="border:1px solid #f56954" @endif>Multa (%)</label>
                                                    <input id="multa" type="text" class="form-control pula" name="multa" placeholder="0,00" value="{{ old('multa') }}" @if($errors->has('multa')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('multa') )
                                                        <span style="color: #f56954">{{ $errors->get('multa')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Juros" class="control-label" @if($errors->has('juros')) style="border:1px solid #f56954" @endif>Juros (%)</label>
                                                    <input id="Juros" type="text" class="form-control pula" name="juros" placeholder="0,00" value="{{ old('juros') }}" @if($errors->has('juros')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('juros') )
                                                        <span style="color: #f56954">{{ $errors->get('juros')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tipo_juros" class="control-label" @if($errors->has('tipo_juros')) style="border:1px solid #f56954" @endif>Tipo de juros</label>
                                                    <select name="tipo_juros" id="tipo_juros" class="form-control pula" @if($errors->has('tipo_juros')) style="border:1px solid #f56954" @endif>
                                                        <option disabled selected>----------Selecione----------</option>
                                                        <option value="AD" {{ old('tipo_juros') == 'AD' ? 'selected' : '' }}>Ao Dia</option>
                                                        <option value="AM" {{ old('tipo_juros') == 'AM' ? 'selected' : '' }}>Ao Mês</option>
                                                    </select>
                                                    @if( $errors->has('tipo_juros') )
                                                        <span style="color: #f56954">{{ $errors->get('tipo_juros')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="protestar" class="control-label" @if($errors->has('protestar')) style="border:1px solid #f56954" @endif>Protestar (S/N) </label>
                                                <select name="protestar" id="protestar" class="form-control pula" @if($errors->has('protestar')) style="border:1px solid #f56954" @endif>
                                                    <option disabled selected>Selecione</option>
                                                    <option value="1" {{ old('protestar') == '1' ? 'selected' : '' }}>Sim</option>
                                                    <option value="0" {{ old('protestar') == '0' ? 'selected' : '' }}>Não</option>
                                                </select>
                                                @if( $errors->has('protestar') )
                                                    <span style="color: #f56954">{{ $errors->get('protestar')[0] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-warning">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Mensagens do Boleto</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="mensagem1" class="control-label" @if($errors->has('mensagem1')) style="border:1px solid #f56954" @endif>Mensagem</label>
                                                    <input id="mensagem1" type="text" class="form-control pula" name="mensagem1" value="{{ old('mensagem1') }}" @if($errors->has('mensagem1')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('mensagem1') )
                                                        <span style="color: #f56954">{{ $errors->get('mensagem1')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="mensagem2" type="text" class="form-control pula" name="mensagem2" value="{{ old('mensagem2') }}" @if($errors->has('mensagem2')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('mensagem2') )
                                                        <span style="color: #f56954">{{ $errors->get('mensagem2')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="mensagem3" type="text" class="form-control pula" name="mensagem3" value="{{ old('mensagem3') }}" @if($errors->has('mensagem3')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('mensagem3') )
                                                        <span style="color: #f56954">{{ $errors->get('mensagem3')[0] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="mensagem4" type="text" class="form-control pula" name="mensagem4" value="{{ old('mensagem4') }}" @if($errors->has('mensagem4')) style="border:1px solid #f56954" @endif>
                                                    @if( $errors->has('mensagem4') )
                                                        <span style="color: #f56954">{{ $errors->get('mensagem4')[0] }}</span>
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
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $("#condominio").focus();
        });
    </script>
@stop
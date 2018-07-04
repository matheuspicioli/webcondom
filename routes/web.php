<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/debug', 'DebugController@debug')->name('debug')->middleware('auth');

Route::prefix('Relatorios')->namespace('Relatorios')->middleware('auth')->group( function() {
	Route::get('/', 'RelatoriosController@exemplo')->name('relatorios.exemplo');
});

Route::prefix('Condominios')->namespace('Condominios')->middleware('auth')->group(function(){
    Route::prefix('Sindicos')->group(function(){
        Route::get('/', 'SindicosController@listar')->name('condominios.sindicos.listar');
        Route::get('Criar', 'SindicosController@criar')->name('condominios.sindicos.criar');
        Route::post('/', 'SindicosController@salvar')->name('condominios.sindicos.salvar');
        Route::get('{id}/Exibir', 'SindicosController@exibir')->name('condominios.sindicos.exibir');
        Route::put('{id}/Alterar', 'SindicosController@alterar')->name('condominios.sindicos.alterar');
        Route::delete('{id}', 'SindicosController@excluir')->name('condominios.sindicos.excluir');
    });

    Route::prefix('Unidades')->group(function(){
        Route::get('Criar/{idCondominio}', 'UnidadesController@criar')->name('condominios.unidades.criar');
        Route::get('/{idCondominio?}', 'UnidadesController@listar')->name('condominios.unidades.listar');
        Route::post('/{idCondominio}', 'UnidadesController@salvar')->name('condominios.unidades.salvar');
        Route::get('{id}/Exibir/{idCondominio}', 'UnidadesController@exibir')->name('condominios.unidades.exibir');
        Route::put('{id}/Alterar/{idCondominio}', 'UnidadesController@alterar')->name('condominios.unidades.alterar');
        Route::delete('{id}/{idCondominio}', 'UnidadesController@excluir')->name('condominios.unidades.excluir');
    });

    Route::prefix('Condominios')->group(function(){
        Route::get('/', 'CondominiosController@listar')->name('condominios.condominios.listar');
        Route::get('Criar', 'CondominiosController@criar')->name('condominios.condominios.criar');
        Route::post('/', 'CondominiosController@salvar')->name('condominios.condominios.salvar');
        Route::get('{id}/Exibir', 'CondominiosController@exibir')->name('condominios.condominios.exibir');
        Route::put('{id}/Alterar', 'CondominiosController@alterar')->name('condominios.condominios.alterar');
        Route::delete('{id}', 'CondominiosController@excluir')->name('condominios.condominios.excluir');
    });

    Route::prefix('CondominiosTaxas')->group(function(){
        Route::get('Criar/{idCondominio}', 'CondominiosTaxasController@criar')->name('condominios.condominiostaxas.criar');
        Route::get('/{idCondominio?}', 'CondominiosTaxasController@listar')->name('condominios.condominiostaxas.listar');
        Route::post('/{idCondominio}', 'CondominiosTaxasController@salvar')->name('condominios.condominiostaxas.salvar');
        Route::get('{id}/Exibir/{idCondominio}', 'CondominiosTaxasController@exibir')->name('condominios.condominiostaxas.exibir');
        Route::put('{id}/Alterar/{idCondominio}', 'CondominiosTaxasController@alterar')->name('condominios.condominiostaxas.alterar');
        Route::delete('{id}/{idCondominio}', 'CondominiosTaxasController@excluir')->name('condominios.condominiostaxas.excluir');
    });
    Route::prefix('Imoveis')->group(function(){
        Route::get('/', 'ImoveisController@listar')->name('condominios.imoveis.listar');
        Route::get('Criar', 'ImoveisController@criar')->name('condominios.imoveis.criar');
        Route::post('/', 'ImoveisController@salvar')->name('condominios.imoveis.salvar');
        Route::get('{id}/Exibir', 'ImoveisController@exibir')->name('condominios.imoveis.exibir');
        Route::put('{id}/Alterar', 'ImoveisController@alterar')->name('condominios.imoveis.alterar');
        Route::delete('{id}', 'ImoveisController@excluir')->name('condominios.imoveis.excluir');
    });
});

Route::prefix('Financeiros')->namespace('Financeiros')->middleware('auth')->group(function(){
    Route::prefix('PlanoDeContas')->group(function(){
        Route::get('/', 'PlanoDeContasController@listar')->name('financeiros.planodecontas.listar');
        Route::get('Criar', 'PlanoDeContasController@criar')->name('financeiros.planodecontas.criar');
        Route::post('/', 'PlanoDeContasController@salvar')->name('financeiros.planodecontas.salvar');
        Route::get('{tipo}/{grupo}/{conta}/Exibir', 'PlanoDeContasController@exibir')->name('financeiros.planodecontas.exibir');
        Route::get('{tipo}/{grupo}/ExibirGrupo', 'PlanoDeContasController@exibirGrupo')->name('financeiros.planodecontas.exibirgrupo');
        Route::put('{tipo}/{grupo}/{conta?}', 'PlanoDeContasController@alterar')->name('financeiros.planodecontas.alterar');
        Route::delete('{id}/ExcluirGrupo', 'PlanoDeContasController@excluirGrupo')->name('financeiros.planodecontas.excluirgrupo');
        Route::delete('{id}/ExcluirConta', 'PlanoDeContasController@excluirConta')->name('financeiros.planodecontas.excluirconta');
        Route::get('Exportar/{tipo}', 'PlanoDeContasController@exportar')->name('financeiros.planodecontas.exportar');
        Route::get('ConsultarProximoGrupo/{tipo?}', 'PlanoDeContasController@ProximoGrupo')->name('financeiros.planodecontas.proximogrupo');
        Route::get('ConsultarProximaConta/{tipo?}/{grupo?}', 'PlanoDeContasController@ProximaConta')->name('financeiros.planodecontas.proximaconta');
    });

    Route::prefix('Lancamentos')->group(function(){
        Route::post('/ListarDatas', 'ContaCorrenteLancamentosController@ListarDatas')->name('financeiros.lancamentos.listardatas');
        Route::get('/{conta_id}/{dias?}', 'ContaCorrenteLancamentosController@listar')->name('financeiros.lancamentos.listar');
        Route::get('Criar', 'ContaCorrenteLancamentosController@criar')->name('financeiros.lancamentos.criar');
        Route::post('/', 'ContaCorrenteLancamentosController@salvar')->name('financeiros.lancamentos.salvar');
        Route::get('/Exibir/{id}/{conta_id}/{dias?}', 'ContaCorrenteLancamentosController@exibir')->name('financeiros.lancamentos.exibir');
        Route::put('/Alterar/{id}/{conta_id}/{dias?}', 'ContaCorrenteLancamentosController@alterar')->name('financeiros.lancamentos.alterar');
        Route::put('{id}/Compensar', 'ContaCorrenteLancamentosController@compensar')->name('financeiros.lancamentos.compensar');
        Route::delete('{id}/{conta_id}/{dias?}', 'ContaCorrenteLancamentosController@excluir')->name('financeiros.lancamentos.excluir');
    });

    Route::prefix('Bancos')->group(function(){
        Route::get('/', 'BancosController@listar')->name('financeiros.bancos.listar');
        Route::get('Criar', 'BancosController@criar')->name('financeiros.bancos.criar');
        Route::post('/', 'BancosController@salvar')->name('financeiros.bancos.salvar');
        Route::get('{id}/Exibir', 'BancosController@exibir')->name('financeiros.bancos.exibir');
        Route::put('{id}/Alterar', 'BancosController@alterar')->name('financeiros.bancos.alterar');
        Route::delete('{id}', 'BancosController@excluir')->name('financeiros.bancos.excluir');
    });

    Route::prefix('ContasCorrente')->group(function(){
        Route::get('/', 'ContasCorrenteController@listar')->name('financeiros.contascorrente.listar');
        Route::get('Criar', 'ContasCorrenteController@criar')->name('financeiros.contascorrente.criar');
        Route::post('/', 'ContasCorrenteController@salvar')->name('financeiros.contascorrente.salvar');
        Route::get('{id}/Exibir', 'ContasCorrenteController@exibir')->name('financeiros.contascorrente.exibir');
        Route::put('{id}/Alterar', 'ContasCorrenteController@alterar')->name('financeiros.contascorrente.alterar');
        Route::delete('{id}', 'ContasCorrenteController@excluir')->name('financeiros.contascorrente.excluir');
    });
});

Route::prefix('Balancetes')->namespace('Balancetes')->middleware('auth')->group(function(){
	Route::prefix('Balancetes')->group(function(){
		Route::get('/', 'BalancetesController@listar')->name('financeiros.balancetes.listar');
		Route::post('/ListarFiltro', 'BalancetesController@listarPost')->name('financeiros.balancetes.listarPost');
		Route::get('Criar', 'BalancetesController@criar')->name('financeiros.balancetes.criar');
		Route::post('/', 'BalancetesController@salvar')->name('financeiros.balancetes.salvar');
		Route::get('{id}/Exibir', 'BalancetesController@exibir')->name('financeiros.balancetes.exibir');
		Route::put('{id}/Alterar', 'BalancetesController@alterar')->name('financeiros.balancetes.alterar');
		Route::delete('{id}', 'BalancetesController@excluir')->name('financeiros.balancetes.excluir');
	});

	Route::prefix('Lancamentos')->group(function(){
		Route::get('Criar/{idBalancete}', 'BalanceteLancamentosController@criar')->name('balancetes.lancamentos.criar');
		Route::get('/{idBalancete}', 'BalanceteLancamentosController@listar')->name('balancetes.lancamentos.listar');
		Route::post('/', 'BalanceteLancamentosController@salvar')->name('balancetes.lancamentos.salvar');
		Route::get('{id}/Exibir', 'BalanceteLancamentosController@exibir')->name('balancetes.lancamentos.exibir');
		Route::put('{id}/Alterar', 'BalanceteLancamentosController@alterar')->name('balancetes.lancamentos.alterar');
		Route::delete('{id}', 'BalanceteLancamentosController@excluir')->name('balancetes.lancamentos.excluir');
	});
});

Route::prefix('Enderecos')->namespace('Enderecos')->middleware('auth')->group(function() {
    Route::prefix('Estados')->group(function () {
        Route::get('/', 'EstadosController@listar')->name('enderecos.estados.listar');
        Route::get('Criar', 'EstadosController@criar')->name('enderecos.estados.criar');
        Route::post('/', 'EstadosController@salvar')->name('enderecos.estados.salvar');
        Route::get('{id}/Exibir', 'EstadosController@exibir')->name('enderecos.estados.exibir');
    });

    Route::prefix('Cidades')->group(function () {
        Route::get('/', 'CidadesController@listar')->name('enderecos.cidades.listar');
        Route::get('Criar', 'CidadesController@criar')->name('enderecos.cidades.criar');
        Route::post('/', 'CidadesController@salvar')->name('enderecos.cidades.salvar');
        Route::get('{id}/Exibir', 'CidadesController@exibir')->name('enderecos.cidades.exibir');
        Route::put('{id}/Alterar', 'CidadesController@alterar')->name('enderecos.cidades.alterar');
        Route::delete('{id}', 'CidadesController@excluir')->name('enderecos.cidades.excluir');
    });

    Route::prefix('Enderecos')->group(function () {
        Route::get('/', 'EnderecosController@listar')->name('enderecos.enderecos.listar');
        Route::get('Criar', 'EnderecosController@criar')->name('enderecos.enderecos.criar');
        Route::post('/', 'EnderecosController@salvar')->name('enderecos.enderecos.salvar');
        Route::get('{id}/Exibir', 'EnderecosController@exibir')->name('enderecos.enderecos.exibir');
        Route::put('{id}/Alterar', 'EnderecosController@alterar')->name('enderecos.enderecos.alterar');
        Route::delete('{id}', 'EnderecosController@excluir')->name('enderecos.enderecos.excluir');
    });
});
Route::prefix('Diversos')->namespace('Diversos')->middleware('auth')->group(function(){
    Route::prefix('EstadoCivil')->group(function(){
        Route::get('/', 'EstadoCivilController@listar')->name('diversos.estadoCivil.listar');
        Route::get('Criar', 'EstadoCivilController@criar')->name('diversos.estadoCivil.criar');
        Route::post('/', 'EstadoCivilController@salvar')->name('diversos.estadoCivil.salvar');
        Route::get('{id}/Exibir', 'EstadoCivilController@exibir')->name('diversos.estadoCivil.exibir');
        Route::put('{id}/Alterar', 'EstadoCivilController@alterar')->name('diversos.estadoCivil.alterar');
        Route::delete('{id}', 'EstadoCivilController@excluir')->name('diversos.estadoCivil.excluir');
    });
    Route::prefix('RegimesCasamentos')->group(function(){
        Route::get('/', 'RegimesCasamentosController@listar')->name('diversos.regimeCasamento.listar');
        Route::get('Criar', 'RegimesCasamentosController@criar')->name('diversos.regimeCasamento.criar');
        Route::post('/', 'RegimesCasamentosController@salvar')->name('diversos.regimeCasamento.salvar');
        Route::get('{id}/Exibir', 'RegimesCasamentosController@exibir')->name('diversos.regimeCasamento.exibir');
        Route::put('{id}/Alterar', 'RegimesCasamentosController@alterar')->name('diversos.regimeCasamento.alterar');
        Route::delete('{id}', 'RegimesCasamentosController@excluir')->name('diversos.regimeCasamento.excluir');
    });
    Route::prefix('Departamentos')->group(function(){
        Route::get('/', 'DepartamentosController@listar')->name('diversos.departamento.listar');
        Route::get('Criar', 'DepartamentosController@criar')->name('diversos.departamento.criar');
        Route::post('/', 'DepartamentosController@salvar')->name('diversos.departamento.salvar');
        Route::get('{id}/Exibir', 'DepartamentosController@exibir')->name('diversos.departamento.exibir');
        Route::put('{id}/Alterar', 'DepartamentosController@alterar')->name('diversos.departamento.alterar');
        Route::delete('{id}', 'DepartamentosController@excluir')->name('diversos.departamento.excluir');
    });
    Route::prefix('Setores')->group(function(){
        Route::get('/', 'SetoresController@listar')->name('diversos.setores.listar');
        Route::get('Criar', 'SetoresController@criar')->name('diversos.setores.criar');
        Route::post('/', 'SetoresController@salvar')->name('diversos.setores.salvar');
        Route::get('{id}/Exibir', 'SetoresController@exibir')->name('diversos.setores.exibir');
        Route::put('{id}/Alterar', 'SetoresController@alterar')->name('diversos.setores.alterar');
        Route::delete('{id}', 'SetoresController@excluir')->name('diversos.setores.excluir');
    });
    Route::prefix('Categorias')->group(function(){
        Route::get('/', 'CategoriasController@listar')->name('diversos.categorias.listar');
        Route::get('Criar', 'CategoriasController@criar')->name('diversos.categorias.criar');
        Route::post('/', 'CategoriasController@salvar')->name('diversos.categorias.salvar');
        Route::get('{id}/Exibir', 'CategoriasController@exibir')->name('diversos.categorias.exibir');
        Route::put('{id}/Alterar', 'CategoriasController@alterar')->name('diversos.categorias.alterar');
        Route::delete('{id}', 'CategoriasController@excluir')->name('diversos.categorias.excluir');
    });
    Route::prefix('TiposImoveis')->group(function(){
        Route::get('/', 'TipoImovelController@listar')->name('diversos.tiposimoveis.listar');
        Route::get('Criar', 'TipoImovelController@criar')->name('diversos.tiposimoveis.criar');
        Route::post('/', 'TipoImovelController@salvar')->name('diversos.tiposimoveis.salvar');
        Route::get('{id}/Exibir', 'TipoImovelController@exibir')->name('diversos.tiposimoveis.exibir');
        Route::put('{id}/Alterar', 'TipoImovelController@alterar')->name('diversos.tiposimoveis.alterar');
        Route::delete('{id}', 'TipoImovelController@excluir')->name('diversos.tiposimoveis.excluir');
    });
});

Route::prefix('Autorizacoes')->namespace('Autorizacoes')->middleware('auth')->group(function(){
    Route::get('/', 'AutorizacoesController@listar')->name('autorizacoes.listar');
    Route::post('/salvar_role', 'AutorizacoesController@salvar_role')->name('autorizacoes.roles.salvar');
    Route::post('/salvar_permissao', 'AutorizacoesController@salvar_permissao')->name('autorizacoes.permissoes.salvar');
    Route::post('/role_permissao_associar', 'AutorizacoesController@salvar_role_permissao_associar')->name('autorizacoes.role_permissao_associar.salvar');
    Route::post('/role_usuario_associar', 'AutorizacoesController@salvar_role_usuario_associar')->name('autorizacoes.role_usuario_associar.salvar');
});

Route::prefix('Entidades')->namespace('Entidades')->middleware('auth')->group(function(){
    Route::prefix('Proprietarios')->group(function(){
        Route::get('/', 'ProprietariosController@listar')->name('entidades.proprietarios.listar');
        Route::get('Criar', 'ProprietariosController@criar')->name('entidades.proprietarios.criar');
        Route::post('/', 'ProprietariosController@salvar')->name('entidades.proprietarios.salvar');
        Route::get('{id}/Exibir', 'ProprietariosController@exibir')->name('entidades.proprietarios.exibir');
        Route::get('GetProprietario/{id}', 'ProprietariosController@getProprietario')->name('entidades.proprietarios.getproprietario');
        Route::put('{id}/Alterar', 'ProprietariosController@alterar')->name('entidades.proprietarios.alterar');
        Route::delete('{id}', 'ProprietariosController@excluir')->name('entidades.proprietarios.excluir');
    });
    Route::prefix('Fornecedores')->group(function(){
        Route::get('/', 'FornecedoresController@listar')->name('entidades.fornecedores.listar');
        Route::get('Criar', 'FornecedoresController@criar')->name('entidades.fornecedores.criar');
        Route::post('/', 'FornecedoresController@salvar')->name('entidades.fornecedores.salvar');
        Route::get('{id}/Exibir', 'FornecedoresController@exibir')->name('entidades.fornecedores.exibir');
        Route::put('{id}/Alterar', 'FornecedoresController@alterar')->name('entidades.fornecedores.alterar');
        Route::delete('{id}', 'FornecedoresController@excluir')->name('entidades.fornecedores.excluir');
    });
    Route::prefix('Funcionarios')->group(function(){
        Route::get('/', 'FuncionariosController@listar')->name('entidades.funcionarios.listar');
        Route::get('Criar', 'FuncionariosController@criar')->name('entidades.funcionarios.criar');
        Route::post('/', 'FuncionariosController@salvar')->name('entidades.funcionarios.salvar');
        Route::get('{id}/Exibir', 'FuncionariosController@exibir')->name('entidades.funcionarios.exibir');
        Route::put('{id}/Alterar', 'FuncionariosController@alterar')->name('entidades.funcionarios.alterar');
        Route::delete('{id}', 'FuncionariosController@excluir')->name('entidades.funcionarios.excluir');
    });
    Route::prefix('Empresas')->group(function(){
        Route::get('/', 'EmpresasController@listar')->name('entidades.empresas.listar');
        Route::get('Criar', 'EmpresasController@criar')->name('entidades.empresas.criar');
        Route::post('/', 'EmpresasController@salvar')->name('entidades.empresas.salvar');
        Route::get('{id}/Exibir', 'EmpresasController@exibir')->name('entidades.empresas.exibir');
        Route::put('{id}/Alterar', 'EmpresasController@alterar')->name('entidades.empresas.alterar');
        Route::delete('{id}', 'EmpresasController@excluir')->name('entidades.empresas.excluir');
    });
    Route::prefix('Inquilinos')->group(function(){
        Route::get('/', 'InquilinosController@listar')->name('entidades.inquilinos.listar');
        Route::get('Criar', 'InquilinosController@criar')->name('entidades.inquilinos.criar');
        Route::post('/', 'InquilinosController@salvar')->name('entidades.inquilinos.salvar');
        Route::get('{id}/Exibir', 'InquilinosController@exibir')->name('entidades.inquilinos.exibir');
		Route::get('GetInquilino/{id}', 'InquilinosController@getInquilino')->name('entidades.inquilinos.getinquilino');
        Route::put('{id}/Alterar', 'InquilinosController@alterar')->name('entidades.inquilinos.alterar');
        Route::delete('{id}', 'InquilinosController@excluir')->name('entidades.inquilinos.excluir');
    });
});
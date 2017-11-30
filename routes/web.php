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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('Condominios')->namespace('Condominios')->group(function(){
    Route::prefix('Sindicos')->group(function(){
        Route::get('/', 'SindicosController@listar')->name('condominios.sindicos.listar');
        Route::get('Criar', 'SindicosController@criar')->name('condominios.sindicos.criar');
        Route::post('/', 'SindicosController@salvar')->name('condominios.sindicos.salvar');
        Route::get('{id}/Exibir', 'SindicosController@exibir')->name('condominios.sindicos.exibir');
        Route::put('{id}/Alterar', 'SindicosController@alterar')->name('condominios.sindicos.alterar');
        Route::delete('{id}', 'SindicosController@excluir')->name('condominios.sindicos.excluir');
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
});

Route::prefix('Enderecos')->namespace('Enderecos')->group(function() {
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
Route::prefix('Diversos')->namespace('Diversos')->group(function(){
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
});

Route::prefix('Entidades')->namespace('Entidades')->group(function(){
    Route::prefix('Proprietarios')->group(function(){
        Route::get('/', 'ProprietariosController@listar')->name('entidades.proprietarios.listar');
        Route::get('Criar', 'ProprietariosController@criar')->name('entidades.proprietarios.criar');
        Route::post('/', 'ProprietariosController@salvar')->name('entidades.proprietarios.salvar');
        Route::get('{id}/Exibir', 'ProprietariosController@exibir')->name('entidades.proprietarios.exibir');
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
});
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

Route::prefix('Condominios')->group(function(){
    Route::prefix('Sindicos')->group(function(){
        Route::get('/', 'Condominios\SindicosController@listar')->name('condominios.sindicos.listar');
        Route::get('Criar', 'Condominios\SindicosController@criar')->name('condominios.sindicos.criar');
        Route::post('/', 'Condominios\SindicosController@salvar')->name('condominios.sindicos.salvar');
        Route::get('{id}/Exibir', 'Condominios\SindicosController@exibir')->name('condominios.sindicos.exibir');
        Route::put('{id}/Alterar', 'Condominios\SindicosController@alterar')->name('condominios.sindicos.alterar');
        Route::get('{id}/Excluir', 'Condominios\SindicosController@excluir')->name('condominios.sindicos.excluir');
    });

    Route::prefix('Condominios')->group(function(){
        Route::get('/', 'Condominios\CondominiosController@listar')->name('condominios.condominios.listar');
        Route::get('Criar', 'Condominios\CondominiosController@criar')->name('condominios.condominios.criar');
        Route::post('/', 'Condominios\CondominiosController@salvar')->name('condominios.condominios.salvar');
        Route::get('{id}/Exibir', 'Condominios\CondominiosController@exibir')->name('condominios.condominios.exibir');
        Route::put('{id}/Alterar', 'Condominios\CondominiosController@alterar')->name('condominios.condominios.alterar');
        Route::get('{id}/Excluir', 'Condominios\CondominiosController@excluir')->name('condominios.condominios.excluir');
    });

    Route::prefix('CondominiosTaxas')->group(function(){
        Route::get('Criar', 'Condominios\CondominiosTaxasController@criar')->name('condominios.condominiostaxas.criar');
        Route::get('/{idCondominio?}', 'Condominios\CondominiosTaxasController@listar')->name('condominios.condominiostaxas.listar');
        Route::post('/', 'Condominios\CondominiosTaxasController@salvar')->name('condominios.condominiostaxas.salvar');
        Route::get('{id}/Exibir/{idCondominio?}', 'Condominios\CondominiosTaxasController@exibir')->name('condominios.condominiostaxas.exibir');
        Route::put('{id}/Alterar/{idCondominio?}', 'Condominios\CondominiosTaxasController@alterar')->name('condominios.condominiostaxas.alterar');
        Route::get('{id}/Excluir/{idCondominio?}', 'Condominios\CondominiosTaxasController@excluir')->name('condominios.condominiostaxas.excluir');
    });
});

Route::prefix('Enderecos')->group(function() {
    Route::prefix('Estados')->group(function () {
        Route::get('/', 'Enderecos\EstadosController@listar')->name('enderecos.estados.listar');
        Route::get('Criar', 'Enderecos\EstadosController@criar')->name('enderecos.estados.criar');
        Route::post('/', 'Enderecos\EstadosController@salvar')->name('enderecos.estados.salvar');
        Route::get('{id}/Exibir', 'Enderecos\EstadosController@exibir')->name('enderecos.estados.exibir');
        Route::put('{id}/Alterar', 'Enderecos\EstadosController@alterar')->name('enderecos.estados.alterar');
        Route::get('{id}/Excluir', 'Enderecos\EstadosController@excluir')->name('enderecos.estados.excluir');
    });

    Route::prefix('Cidades')->group(function () {
        Route::get('/', 'Enderecos\CidadesController@listar')->name('enderecos.cidades.listar');
        Route::get('Criar', 'Enderecos\CidadesController@criar')->name('enderecos.cidades.criar');
        Route::post('/', 'Enderecos\CidadesController@salvar')->name('enderecos.cidades.salvar');
        Route::get('{id}/Exibir', 'Enderecos\CidadesController@exibir')->name('enderecos.cidades.exibir');
        Route::put('{id}/Alterar', 'Enderecos\CidadesController@alterar')->name('enderecos.cidades.alterar');
        Route::get('{id}/Excluir', 'Enderecos\CidadesController@excluir')->name('enderecos.cidades.excluir');
    });

    Route::prefix('Enderecos')->group(function () {
        Route::get('/', 'Enderecos\EnderecosController@listar')->name('enderecos.enderecos.listar');
        Route::get('Criar', 'Enderecos\EnderecosController@criar')->name('enderecos.enderecos.criar');
        Route::post('/', 'Enderecos\EnderecosController@salvar')->name('enderecos.enderecos.salvar');
        Route::get('{id}/Exibir', 'Enderecos\EnderecosController@exibir')->name('enderecos.enderecos.exibir');
        Route::put('{id}/Alterar', 'Enderecos\EnderecosController@alterar')->name('enderecos.enderecos.alterar');
        Route::get('{id}/Excluir', 'Enderecos\EnderecosController@excluir')->name('enderecos.enderecos.excluir');
    });
});
Route::prefix('Diversos')->group(function(){
    Route::prefix('EstadoCivil')->group(function(){
        Route::get('/', 'Diversos\EstadoCivilController@listar')->name('diversos.estadoCivil.listar');
        Route::get('Criar', 'Diversos\EstadoCivilController@criar')->name('diversos.estadoCivil.criar');
        Route::post('/', 'Diversos\EstadoCivilController@salvar')->name('diversos.estadoCivil.salvar');
        Route::get('{id}/Exibir', 'Diversos\EstadoCivilController@exibir')->name('diversos.estadoCivil.exibir');
        Route::put('{id}/Alterar', 'Diversos\EstadoCivilController@alterar')->name('diversos.estadoCivil.alterar');
        Route::get('{id}/Excluir', 'Diversos\EstadoCivilController@excluir')->name('diversos.estadoCivil.excluir');
    });
});
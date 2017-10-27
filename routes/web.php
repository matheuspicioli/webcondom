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

Route::prefix('Enderecos')->group(function(){
    Route::prefix('Estados')->group(function(){
        Route::get('/', 'Enderecos\EstadosController@listar')->name('enderecos.estados.listar');
        Route::get('Criar', 'Enderecos\EstadosController@criar')->name('enderecos.estados.criar');
        Route::post('/', 'Enderecos\EstadosController@salvar')->name('enderecos.estados.salvar');
        Route::get('{id}/Exibir', 'Enderecos\EstadosController@exibir')->name('enderecos.estados.exibir');
        Route::put('{id}/Alterar', 'Enderecos\EstadosController@alterar')->name('enderecos.estados.alterar');
        Route::get('{id}/Excluir', 'Enderecos\EstadosController@excluir')->name('enderecos.estados.excluir');
    });
});
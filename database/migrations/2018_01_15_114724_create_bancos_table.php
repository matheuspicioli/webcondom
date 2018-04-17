<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancosTable extends Migration
{
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_banco', 4);
            $table->enum('CNAB', ['240','400','640']);
            //--   $table->primary(['codigo_Banco','CNAB']);  ---//
            $table->string('nome_banco', 40);
            //-----Dados para Boletos-----//
            $table->string('carteira', 6)->nullable();
            $table->integer('tamanho_agencia')->nullable();
            $table->integer('tamanho_conta')->nullable();
            $table->integer('tamanho_cedente')->nullable();
            $table->integer('tamanho_nossonumero')->nullable();
            $table->string('local_pagamento',100)->nullable();
            $table->string('mensagem', 100)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('mascara_cedente', 100)->nullable();
            $table->string('mascara_nossonumero', 100)->nullable();
            //-----Posição de Imporessão dos Cheques-----//
            $table->integer('linha_valor')->nullable();
            $table->integer('coluna_valor')->nullable();
            $table->integer('linha_extenso1')->nullable();
            $table->integer('coluna_extenso1')->nullable();
            $table->integer('linha_extenso2')->nullable();
            $table->integer('coluna_extenso2')->nullable();
            $table->integer('linha_nominal')->nullable();
            $table->integer('coluna_nominal')->nullable();
            $table->integer('linha_dia')->nullable();
            $table->integer('coluna_dia')->nullable();
            $table->integer('linha_mes')->nullable();
            $table->integer('coluna_mes')->nullable();
            $table->integer('linha_ano')->nullable();
            $table->integer('coluna_ano')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bancos');
        Schema::enableForeignKeyConstraints();
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            //-----CAMPOS GERAIS-----//
            $table->increments('id');
            $table->integer('tipo')->unsigned();
            $table->string('cpf_cnpj', 14)->unique();
            $table->string('nome', 100);
            $table->string('apelido', 20);
            $table->string('rg_ie', 30)->nullable();
            $table->string('celular_1', 15)->nullable();
            $table->string('celular_2', 15)->nullable();
            $table->string('telefone_principal', 14)->nullable();
            $table->string('telefone_comercial', 14)->nullable();
            $table->string('site', 255)->nullable();
            $table->string('email', 255)->nullable();
            //-------CAMPOS CNPJ-------//
            $table->string('fantasia', 100)->nullable();
            $table->string('inscricao_municipal', 30)->nullable();
            $table->string('ramo_atividade', 100)->nullable();
            $table->date('data_abertura')->nullable();
            //-------CAMPOS CPF-------//
            $table->string('nome_mae', 100)->nullable();
            $table->integer('estado_civil_id')->unsigned()->nullable();
            $table->integer('regime_casamento_id')->unsigned()->nullable();
            $table->string('profissao', 100)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nacionalidade', 100)->nullable();
            $table->string('empresa', 100)->nullable();
            $table->integer('dependentes')->unsigned()->nullable();
            $table->string('inss', 20)->nullable();

            //-----RELAÇÕES-----//
            $table->integer('endereco_cobranca_id')->unsigned()->nullable();
            $table->foreign('endereco_cobranca_id')
                ->references('id')
                ->on('enderecos')
                ->onDelete('cascade');

            $table->integer('endereco_principal_id')->unsigned()->nullable();
            $table->foreign('endereco_principal_id')
                ->references('id')
                ->on('enderecos')
                ->onDelete('cascade');

            $table->foreign('estado_civil_id')->unsigned()
                ->references('id')
                ->on('estado_civil')
                ->onDelete('cascade');

            $table->foreign('regime_casamento_id')->unsigned()
                ->references('id')
                ->on('regime_casamento')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('entidades');
        Schema::enableForeignKeyConstraints();
    }
}

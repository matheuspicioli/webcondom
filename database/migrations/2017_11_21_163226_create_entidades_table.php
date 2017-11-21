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
            $table->increments('id');
            $table->string('cpf_cnpj', 14)->unique();
            $table->string('nome', 100);
            $table->string('apelido', 20);
            $table->string('rg_ie', 30)->nullable();
            //-------CAMPOS CNPJ-------//
            $table->string('fantasia', 100)->nullable();
            $table->string('inscricao_municipal', 30)->nullable();
            $table->string('ramo_atividade', 100)->nullable();
            $table->dateTime('data_abertura')->nullable();
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
        Schema::dropIfExists('entidades');
    }
}

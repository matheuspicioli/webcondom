<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondominiosTaxasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CondominiosTaxas', function (Blueprint $table) {
            $table->increments('CondominioTaxaID');
            $table->string('Descricao', 100);
            $table->string('Valor', 100);

            // PODE SER NULLABLE, PQ NÃO VAI ESCOLHER O CONDOMINIO NA CRIAÇÃO DELE
            // E SIM NA HORA DE CADASTRAR/ALTERAR CONDOMÍNIOgit a
            $table->integer('CondominioCOD')->unsigned()->nullable();
            $table->foreign('CondominioCOD')
                ->references('CondominioID')
                ->on('Condominios')
                ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('CondominiosTaxas');
        Schema::enableForeignKeyConstraints();
    }
}

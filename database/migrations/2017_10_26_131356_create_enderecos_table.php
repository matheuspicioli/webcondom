<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Enderecos', function (Blueprint $table) {
            $table->increments('EnderecoID');

            $table->string('Rua', 255);
            $table->integer('Numero');
            $table->string('CEP', 8);
            $table->string('Complemento', 50)->nullable();

            $table->integer('CidadeCOD')->unsigned();
            $table->foreign('CidadeCOD')
                ->references('CidadeID')
                ->on('Cidades')
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
        Schema::dropIfExists('enderecos');
    }
}

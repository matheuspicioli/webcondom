<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cidades', function (Blueprint $table) {
            $table->increments('CidadeID');
            $table->string('Descricao', 100);
            $table->string('CodigoIBGE', 7)->nullable();
            $table->integer('EstadoCOD')->unsigned();

            $table->foreign('EstadoCOD')
                ->references('EstadoID')
                ->on('Estados')
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
        Schema::dropIfExists('Cidades');
        Schema::enableForeignKeyConstraints();
    }
}

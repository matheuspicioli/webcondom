<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->nullable()->unsigned();
            $table->string('foto',255)->nullable();

            $table->integer('setor_id')->nullable()->unsigned();
            $table->foreign('setor_id')
                ->references('id')
                ->on('setores')
                ->onDelete('cascade');

            $table->integer('departamento_id')->nullable()->unsigned();
            $table->foreign('departamento_id')
                ->references('id')
                ->on('departamentos')
                ->onDelete('cascade');

            $table->integer('entidade_id')->nullable()->unsigned();
            $table->foreign('entidade_id')
                ->references('id')
                ->on('entidades')
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
        Schema::dropIfExists('funcionarios');
        Schema::enableForeignKeyConstraints();
    }
}

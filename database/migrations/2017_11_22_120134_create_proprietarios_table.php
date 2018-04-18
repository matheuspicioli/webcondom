<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProprietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unsigned();

            $table->integer('entidade_id')->unsigned()->nullable();
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
        Schema::dropIfExists('proprietarios');
        Schema::enableForeignKeyConstraints();
    }
}

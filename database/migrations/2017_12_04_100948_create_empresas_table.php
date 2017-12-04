<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->nullable();
            $table->string('razao_social', 100);
            $table->string('creci', 10)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('inscricao_estadual', 30)->nullable();
            $table->string('email_nfe', 200);

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
        Schema::dropIfExists('empresas');
    }
}

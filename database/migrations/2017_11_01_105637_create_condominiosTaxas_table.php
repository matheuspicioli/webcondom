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
        Schema::create('condominio_taxas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->string('valor', 100);

            $table->integer('condominio_id')->unsigned();
            $table->foreign('condominio_id')
                ->references('id')
                ->on('condominios')
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
        Schema::dropIfExists('condominio_taxas');
        Schema::enableForeignKeyConstraints();
    }
}

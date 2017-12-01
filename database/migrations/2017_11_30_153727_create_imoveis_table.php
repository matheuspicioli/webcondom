<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo');
            $table->string('referencia', 20);
            $table->integer('endereco_id')->unsigned()->nullable();
            $table->integer('tipo_imovel_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('condominio_id')->unsigned();
            $table->decimal('valor_locacao', 12, 2)->unsigned();
            $table->decimal('valor_venda', 12, 2)->unsigned();
            $table->string('codigo_agua', 20);
            $table->string('codigo_iptu', 20);
            $table->string('codigo_energia', 20);
            $table->string('descritivo', 255);

            $table->foreign('endereco_id')
                ->references('id')
                ->on('enderecos')
                ->onDelete('cascade');

            $table->foreign('tipo_imovel_id')
                ->references('id')
                ->on('tipo_imovel')
                ->onDelete('cascade');

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade');

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
        Schema::dropIfExists('imoveis');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('apelido', 20);
            $table->string('telefone', 13)->nullable();
            $table->string('celular', 14);
            $table->integer('unidades')->unsigned();
            $table->boolean('tem_gas')->default(0);
            $table->decimal('valor_gas', 12, 2)->nullable();
            $table->string('email', 255)->nullable();

            $table->integer('endereco_id')->unsigned()->nullable();
            $table->foreign('endereco_id')
                ->references('id')
                ->on('enderecos')
                ->onDelete('cascade');

            $table->integer('sindico_id')->unsigned();
            $table->foreign('sindico_id')
                ->references('id')
                ->on('sindicos')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('condominios');
        Schema::enableForeignKeyConstraints();
    }
}

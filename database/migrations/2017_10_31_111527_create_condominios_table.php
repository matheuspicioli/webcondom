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
        Schema::create('Condominios', function (Blueprint $table) {
            $table->increments('CondominioID');
            $table->string('Nome', 100);
            $table->string('Apelido', 20);
            $table->string('Telefone', 13)->nullable();
            $table->string('Celular', 14);
            $table->integer('Unidades')->unsigned();
            $table->decimal('Multa', 8, 4)->nullable();
            $table->decimal('Juros', 8,4)->nullable();
            $table->enum('TipoJuros', ['AM', 'AD']);
            $table->boolean('TemGas')->default(0);
            $table->decimal('ValorGas', 12, 2)->nullable();

            $table->integer('EnderecoCOD')->unsigned();
            $table->foreign('EnderecoCOD')
                ->references('EnderecoID')
                ->on('Enderecos')
                ->onDelete('cascade');

            $table->integer('SindicoCOD')->unsigned();
            $table->foreign('SindicoCOD')
                ->references('SindicoID')
                ->on('Sindicos')
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
        Schema::dropIfExists('Condominios');
        Schema::enableForeignKeyConstraints();
    }
}

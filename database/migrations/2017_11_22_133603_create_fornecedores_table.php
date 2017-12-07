<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unsigned();
            $table->enum('tipo_fornecedor', ['PECAS', 'SERVICOS']);

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
        Schema::dropIfExists('fornecedores');
        Schema::enableForeignKeyConstraints();
    }
}

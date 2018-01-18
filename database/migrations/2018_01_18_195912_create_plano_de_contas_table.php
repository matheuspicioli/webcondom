<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePlanoDeContasTable.
 */
class CreatePlanoDeContasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plano_de_contas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->enum('tipo', ['Receita', 'Despesa']);
            $table->enum('categoria', ['Ativo', 'Passivo'])->nullable();
            $table->string('classificacao', 20)->nullable();
            $table->integer('codigo')->unsigned()->nullable();

            $table->integer('grupo_contas_id')->unsigned();
            $table->foreign('grupo_contas_id')
                ->references('id')
                ->on('grupo_de_contas')
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
		Schema::drop('plano_de_contas');
		Schema::enableForeignKeyConstraints();
	}
}

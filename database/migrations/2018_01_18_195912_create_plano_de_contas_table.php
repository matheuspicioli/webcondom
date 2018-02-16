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
            $table->enum('tipo', [1,2,3]);
            $table->string('descricao',100)->nullable();
            $table->enum('ratear',['Sim', 'Nao']);

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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateContasCorrentesTable.
 */
class CreateContasCorrenteTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contas_corrente', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('condominio_id')->unsigned();
            $table->integer('codigo')->unsigned()->nullable();
            $table->integer('banco_id')->unsigned();
            $table->string('agencia', 30);
            $table->string('conta',30);
            $table->dateTime('inicio');
            $table->boolean('principal')->default(false);

            //DADOS PARA BOLETO
            $table->string('nome', 40);
            $table->string('boleto_agencia',30)->nullable();
            $table->string('boleto_conta',30)->nullable();
            $table->string('cedente',30)->nullable();
            $table->string('carteira',10)->nullable();
            $table->boolean('aceite')->default(0)->nullable();
            $table->string('nosso_numero', 20)->nullable();
            $table->integer('prazo_baixa')->nullable();
            $table->decimal('multa', 6, 2)->nullable();
            $table->decimal('juros', 8,4)->nullable();
            $table->enum('tipo_juros', ['AM', 'AD'])->nullable();
            $table->boolean('protestar')->default(0)->nullable();
            $table->string('mensagem1', 80)->nullable();
            $table->string('mensagem2', 80)->nullable();
            $table->string('mensagem3', 80)->nullable();
            $table->string('mensagem4', 80)->nullable();

            //FOREIGN KEYS
            $table->foreign('condominio_id')
                ->references('id')
                ->on('condominios')
                ->onDelete('cascade');
            $table->foreign('banco_id')
                ->references('id')
                ->on('bancos')
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
		Schema::drop('contas_corrente');
        Schema::enableForeignKeyConstraints();
	}
}

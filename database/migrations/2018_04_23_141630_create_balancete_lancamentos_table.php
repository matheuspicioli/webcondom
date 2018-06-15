<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceteLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balancete_lancamentos', function (Blueprint $table) {
            $table->increments('id');

            $table->date('data_lancamento');
			$table->string('documento',15);
			$table->string('historico',100);
			$table->decimal('valor',12,2);
			$table->enum('tipo',['Credito','Debito']);
			$table->string('folha',4)->nullable();

            $table->integer('balancete_id')->unsigned();
            $table->integer('plano_contas_id')->unsigned();
            $table->integer('fornecedor_id')->unsigned()->nullable();

            $table->foreign('balancete_id')
				->references('id')
				->on('balancetes')
				->onDelete('cascade');
			$table->foreign('plano_contas_id')
				->references('id')
				->on('contas')
				->onDelete('cascade');
			$table->foreign('fornecedor_id')
				->references('id')
				->on('fornecedores')
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
        Schema::dropIfExists('balancete_lancamentos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balancetes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('referencia',20)->nullable();
            $table->string('competencia',6)->nullable();
            $table->date('data_inicial');
            $table->date('data_final');
            $table->decimal('saldo_anterior',12,2);
            $table->decimal('saldo_atual',12,2);

            $table->integer('condominio_id')->unsigned();
            $table->foreign('condominio_id')
				->references('id')
				->on('condominios')
				->onDelete('cascade');

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
        Schema::dropIfExists('balancetes');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo')->unsigned();
            $table->string('descricao', 25);
            $table->integer('plano_conta_id')->unsigned();
            $table->foreign('plano_conta_id')
                ->references('id')
                ->on('plano_contas')
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
        Schema::dropIfExists('tipos');
        Schema::enableForeignKeyConstraints();
    }
}

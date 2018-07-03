<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grupo',3)->default('000');
            $table->string('descricao',50)->nullable();
            $table->enum('ratear',['Sim', 'Não']);
            $table->integer('plano_de_conta_id')->unsigned();
            $table->foreign('plano_de_conta_id')
                ->references('id')
                ->on('plano_de_contas')
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
        Schema::dropIfExists('grupos');
    }
}

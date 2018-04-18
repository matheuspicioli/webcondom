<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoCivilTable extends Migration
{
    public function up()
    {
        Schema::create('estado_civil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->enum('exige_conjuge', ['Sim','Nao'])->default('Nao');
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
        Schema::dropIfExists('estado_civil');
    }
}

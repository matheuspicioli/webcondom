<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoCivilTable extends Migration
{
    public function up()
    {
        Schema::create('EstadoCivil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Descricao', 100);
            $table->boolean('ExigeConjuge')->default(0);
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
        Schema::dropIfExists('EstadoCivil');
    }
}

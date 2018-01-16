<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancosTable extends Migration
{
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoBanco', 4);
            $table->enum('CNAB', ['240','400','640']);
            //--   $table->primary(['codigoBanco','CNAB']);  ---//
            $table->string('nomeBanco', 40);
            //-----Dados para Boletos-----//
            $table->string('carteira', 6)->nullable();
            $table->integer('tamAgencia')->nullable();
            $table->integer('tamConta')->nullable();
            $table->integer('tamCedente')->nullable();
            $table->integer('tamNossoNumero')->nullable();
            $table->string('localPagamento',100)->nullable();
            $table->string('mensagem', 100)->nullable();
            $table->string('logotipo', 255)->nullable();
            $table->string('mskCedente', 100)->nullable();
            $table->string('mskNossoNumero', 100)->nullable();
            //-----Posição de Imporessão dos Cheques-----//
            $table->integer('l_valor')->nullable();
            $table->integer('c_valor')->nullable();
            $table->integer('l_extenso1')->nullable();
            $table->integer('c_extenso1')->nullable();
            $table->integer('l_extenso2')->nullable();
            $table->integer('c_extenso2')->nullable();
            $table->integer('l_nominal')->nullable();
            $table->integer('c_nominal')->nullable();
            $table->integer('l_dia')->nullable();
            $table->integer('c_dia')->nullable();
            $table->integer('l_mes')->nullable();
            $table->integer('c_mes')->nullable();
            $table->integer('l_ano')->nullable();
            $table->integer('c_ano')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bancos');
        Schema::enableForeignKeyConstraints();
    }
}
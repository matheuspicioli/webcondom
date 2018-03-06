<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContaCorrenteLancamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ContaCorrenteLancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nota_fiscal',10)->nullable();
            $table->string('parcela',3)->nullable();
            $table->string('documento',10);
            $table->enum('tipo', ['Debito', 'Credito']);
            $table->decimal('valor',12,2);
            $table->enum('compensado', ['Sim', 'Nao'])->default('Nao');

            ##########CAMPOS PARA O CHEQUE##########
            $table->enum('cheque', ['Sim', 'Nao']);
            $table->date('enviado_em')->nullable();
            $table->date('retorno_em')->nullable();
            $table->enum('assinado', ['Sim', 'Nao']);
            ##########CAMPOS PARA O CHEQUE##########

            $table->integer('fornecedor_id')->unsigned()->nullable();
            $table->integer('conta_corrente_id')->unsigned();
            $table->integer('tipo_conta_id')->unsigned();
            $table->foreign('tipo_conta_id')
                ->references('id')
                ->on('tipos')
                ->onDelete('cascade');
            $table->foreign('fornecedor_id')
                ->references('id')
                ->on('fornecedores')
                ->onDelete('cascade');
            $table->foreign('conta_corrente_id')
                ->references('id')
                ->on('contas_corrente')
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
        Schema::dropIfExists('ContaCorrenteLancamentos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('condominio_id')->unsigned();
            $table->string('bloco', 4)->nullable();
            $table->string('unidade', 4)->nullable();
            $table->integer('tipo_imovel_id')->unsigned();
            $table->integer('garagem')->nullable();
            $table->enum('bloquear_acesso', ['Sim', 'Nao'])->default('Nao');
            $table->integer('proprietario_id')->unsigned();
            $table->integer('inquilino_id')->unsigned()->nullable();
            $table->decimal('area_util',10,3);
            $table->decimal('area_total',10,3);
            $table->decimal('indice',10,6);
            $table->enum('boleto_impresso', ['Sim', 'Nao'])->default('Nao');
            $table->enum('boleto_impresso_destino', ['Portaria', 'Correios']);
            $table->enum('boleto_email', ['Sim', 'Nao'])->default('Nao');
            $table->enum('boleto_email_destino', ['Proprietario', 'Inquilino','Todos']);
            $table->enum('convocacao', ['Portaria', 'Correios']);
            $table->enum('convocacao_destino', ['Proprietario', 'Inquilino','Todos']);
            $table->enum('correspondencia', ['Portaria', 'Correios']);
            $table->enum('correspondencia_destino', ['Proprietario', 'Inquilino','Todos']);
            $table->string('imobiliaria', 50)->nullable();
            $table->string('imobiliaria_contato', 50)->nullable();
            $table->string('observacoes', 200)->nullable();

            $table->foreign('condominio_id')
                ->references('id')
                ->on('condominios')
                ->onDelete('cascade');

            $table->foreign('tipo_imovel_id')
                ->references('id')
                ->on('tipo_imovel')
                ->onDelete('cascade');

            $table->foreign('proprietario_id')
                ->references('id')
                ->on('proprietarios')
                ->onDelete('cascade');

            $table->foreign('inquilino_id')
                ->references('id')
                ->on('inquilinos')
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
        Schema::dropIfExists('unidades');
        Schema::enableForeignKeyConstraints();
    }
}

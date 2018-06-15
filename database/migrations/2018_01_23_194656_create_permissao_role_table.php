<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaoRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_role', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('permissao_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permissao_id')
                ->references('id')
                ->on('permissoes')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
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
        Schema::dropIfExists('permissao_role');
        Schema::enableForeignKeyConstraints();
    }
}

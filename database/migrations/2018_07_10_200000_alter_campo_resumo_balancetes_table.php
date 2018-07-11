<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampoResumoBalancetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balancetes', function (Blueprint $table) {
            $table->longText('resumo')->nullable()->after('saldo_atual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('balancetes', function (Blueprint $table) {
            $table->dropColumn('resumo');
        });
    }
}

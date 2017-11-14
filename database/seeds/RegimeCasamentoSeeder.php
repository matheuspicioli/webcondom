<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Diversos\RegimeCasamento;

class RegimeCasamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegimeCasamento::Create(['Descricao' => 'COMUNHÃO TOTAL DE BENS']);
        RegimeCasamento::Create(['Descricao' => 'COMUNHÃO PARCIAL DE BENS']);
        RegimeCasamento::Create(['Descricao' => 'SEPARAÇÃO DE BENS']);

    }
}

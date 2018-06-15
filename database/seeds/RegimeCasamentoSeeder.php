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
        RegimeCasamento::create(['descricao' => 'COMUNHÃO TOTAL DE BENS']);
        RegimeCasamento::create(['descricao' => 'COMUNHÃO PARCIAL DE BENS']);
        RegimeCasamento::create(['descricao' => 'SEPARAÇÃO DE BENS']);

    }
}

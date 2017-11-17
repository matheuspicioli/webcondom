<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Diversos\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::Create(['Descricao' => 'FINANCEIRO']);
        Departamento::Create(['Descricao' => 'COMERCIAL']);
        Departamento::Create(['Descricao' => 'GERENCIA']);

    }
}

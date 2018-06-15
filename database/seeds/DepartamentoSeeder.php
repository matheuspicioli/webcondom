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
        Departamento::create(['descricao' => 'FINANCEIRO']);
        Departamento::create(['descricao' => 'COMERCIAL']);
        Departamento::create(['descricao' => 'GERENCIA']);
    }
}

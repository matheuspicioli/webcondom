<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Financeiros\PlanoDeConta;
use WebCondom\Models\Financeiros\Tipo;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanoDeConta::create([
            'tipo'              => 1,
            'descricao'         => 'RECEITA'
        ]);
        PlanoDeConta::create([
            'tipo'              => 2,
            'descricao'         => 'DESPESA'
        ]);
        PlanoDeConta::create([
            'tipo'              => 3,
            'descricao'         => 'TRANSFERÊNCIA'
        ]);
    }
}

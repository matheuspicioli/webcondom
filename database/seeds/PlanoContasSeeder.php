<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Financeiros\PlanoDeConta;

class PlanoContasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanoDeConta::create([
            'descricao'     => 'PRIMEIRO PLANO DE CONTAS',
            'ratear'        => 'Sim'
        ]);

        PlanoDeConta::create([
            'descricao'     => 'SEGUNDO PLANO DE CONTAS',
            'ratear'        => 'Sim'
        ]);

        PlanoDeConta::create([
            'descricao'     => 'TERCEIRO PLANO DE CONTAS',
            'ratear'        => 'Sim'
        ]);
    }
}

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

        Tipo::create([
            'tipo'              => 1,
            'descricao'         => 'RECEITA',
            'plano_conta_id'    => 1
        ]);
        Tipo::create([
            'tipo'              => 2,
            'descricao'         => 'DESPESA',
            'plano_conta_id'    => 1
        ]);
        Tipo::create([
            'tipo'              => 3,
            'descricao'         => 'TRANSFERÊNCIA',
            'plano_conta_id'    => 1
        ]);
    }
}

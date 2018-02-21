<?php

use Illuminate\Database\Seeder;
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

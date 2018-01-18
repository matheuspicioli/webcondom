<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Financeiros\GrupoDeConta;

class GrupoDeContasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrupoDeConta::create([
            'descricao' => 'MERCADO BITCOIN',
            'ratear'    => true
        ]);
        GrupoDeConta::create([
            'descricao' => 'FOXBIT EXCHANGE',
            'ratear'    => true
        ]);
    }
}

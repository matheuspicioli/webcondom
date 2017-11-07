<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Condominios\CondominioTaxa;

class CondominiosTaxasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CondominioTaxa::Create([
            'Descricao'  => 'TAXA DE MUDANÇA',
            'Valor' => '350,00',
            'CondominioCOD'  => '5']);
        CondominioTaxa::Create([
            'Descricao'  => 'TX.ALUGUEL SALAO DE FESTAS',
            'Valor' => '30% VLR.CONDOMINIO',
            'CondominioCOD'  => '5']);
        CondominioTaxa::Create([
            'Descricao'  => 'TAXA DE LIMPEZA',
            'Valor' => '50,00',
            'CondominioCOD'  => '5']);
        CondominioTaxa::Create([
            'Descricao'  => 'TAXA DE MUDANÇA',
            'Valor' => '1/2 SAL.MINIMO',
            'CondominioCOD'  => '6']);

    }
}

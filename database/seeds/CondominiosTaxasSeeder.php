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
            'descricao'  => 'TAXA DE MUDANÇA',
            'valor' => '350,00',
            'condominio_id'  => '5']);
        CondominioTaxa::Create([
            'descricao'  => 'TX.ALUGUEL SALAO DE FESTAS',
            'valor' => '30% VLR.CONDOMINIO',
            'condominio_id'  => '5']);
        CondominioTaxa::Create([
            'descricao'  => 'TAXA DE LIMPEZA',
            'valor' => '50,00',
            'condominio_id'  => '5']);
        CondominioTaxa::Create([
            'descricao'  => 'TAXA DE MUDANÇA',
            'valor' => '1/2 SAL.MINIMO',
            'condominio_id'  => '6']);

    }
}

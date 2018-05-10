<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Balancetes\Balancete;

class BalancetesSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            [
                'id'                => '22',
                'competencia'       => '201802',
                'referencia'        => 'FEVEREIRO/2018',
                'data_inicial'      => '2018-02-01',
                'data_final'        => '2018-02-28',
                'saldo_anterior'    => '22.22',
                'saldo_atual'       => '200',
                'condominio_id'     => '5'
            ],
            [
                'id'                => '21',
                'competencia'       => '201802',
                'referencia'        => 'FEVEREIRO/2018',
                'data_inicial'      => '2018-02-01',
                'data_final'        => '2018-02-28',
                'saldo_anterior'    => '2000',
                'saldo_atual'       => '2000',
                'condominio_id'     => '6'
            ],
            [
                'id'                => '23',
                'competencia'       => '201803',
                'referencia'        => 'MARÇO/2018',
                'data_inicial'      => '2018-03-01',
                'data_final'        => '2018-03-31',
                'saldo_anterior'    => '33.33',
                'saldo_atual'       => '300',
                'condominio_id'     => '5'
            ],
            [
                'id'                => '24',
                'competencia'       => '201804',
                'referencia'        => 'ABRIL/2018',
                'data_inicial'      => '2018-04-01',
                'data_final'        => '2018-04-30',
                'saldo_anterior'    => '44.44',
                'saldo_atual'       => '400',
                'condominio_id'     => '5'
            ]
        ];
        foreach ($dados as $dado) {
            Balancete::create($dado);
        };
    }
}

<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Financeiros\Conta;
use WebCondom\Models\Financeiros\Grupo;
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
        $grupos = [
        [
            'grupo'             =>'001',
            'descricao'         => 'RECEBIMENTO DE CONDOMINIOS',
            'ratear'            => 1,
            'plano_de_conta_id'    => 1
        ],
        [
            'grupo'             =>'002',
            'descricao'         => 'RECEBIMENTO DE SALAO DE FESTAS',
            'ratear'            => 1,
            'plano_de_conta_id'    => 1
        ],
        [
            'grupo'             =>'001',
            'descricao'         => 'DEPARTAMENTO PESSOAL',
            'ratear'            => 1,
            'plano_de_conta_id'    => 2
        ],
        [
            'grupo'             =>'002',
            'descricao'         => 'TAXAS E CONSUMO',
            'ratear'            => 1,
            'plano_de_conta_id'    => 2
        ],
        [
            'grupo'             =>'003',
            'descricao'         => 'MANUTENCAO E CONSERVACAO',
            'ratear'            => 1,
            'plano_de_conta_id'    => 2
        ],
        [
            'grupo'             =>'001',
            'descricao'         => 'TRANSFERENCIA ENTRE CONTAS',
            'ratear'            => 1,
            'plano_de_conta_id'    => 3
        ]
        ];
        foreach ($grupos as $grupo) {
            Grupo::create($grupo);
        };

        $contas = [
            [
                'conta'     => '0001',
                'descricao' => 'RECEBIMENTO DE TAXAS CONDOMINIAIS',
                'grupo_id'  => 1
            ],
            [
                'conta'     => '0002',
                'descricao' => 'RECEBIMENTO DE MUTTAS E JUROS',
                'grupo_id'  => 1
            ],
            [
                'conta'     => '0001',
                'descricao' => 'ALUGUEL DE SALAO DE FESTAS',
                'grupo_id'  => 2
            ],
            [
                'conta'     => '0001',
                'descricao' => 'SALARIO DE FUNCIONARIOS',
                'grupo_id'  => 3
            ],
            [
                'conta'     => '0002',
                'descricao' => 'VALE TRANSPORTE',
                'grupo_id'  => 3
            ],
            [
                'conta'     => '0003',
                'descricao' => 'FERIAS',
                'grupo_id'  => 3
            ],
            [
                'conta'     => '0001',
                'descricao' => 'CPFL - ENERGIA ELETRICA',
                'grupo_id'  => 4
            ],
            [
                'conta'     => '0002',
                'descricao' => 'SEMAE - AGUA E ESGOTO',
                'grupo_id'  => 4
            ],
            [
                'conta'     => '0003',
                'descricao' => 'TAXA DE ADMINISTRACAO',
                'grupo_id'  => 4
            ],
            [
                'conta'     => '0099',
                'descricao' => 'DIVERSOS',
                'grupo_id'  => 4
            ],
            [
                'conta'     => '0001',
                'descricao' => 'MANUTENCAO DE ELEVADORES',
                'grupo_id'  => 5
            ],
            [
                'conta'     => '0002',
                'descricao' => 'LIMPEZA DE PISCINAS',
                'grupo_id'  => 5
            ],
            [
                'conta'     => '0003',
                'descricao' => 'MATERIAL DE LIMPEZA',
                'grupo_id'  => 5
            ],
            [
                'conta'     => '0004',
                'descricao' => 'PAISAGISMO',
                'grupo_id'  => 5
            ],
            [
                'conta'     => '0006',
                'descricao' => 'TX.MANUTENCAO SISTEMA CONDOM',
                'grupo_id'  => 5
            ],
            [
                'conta'     => '0018',
                'descricao' => 'DIVERSOS',
                'grupo_id'  => 5
            ],
            [
                'conta'     => '0019',
                'descricao' => 'TARIFAS BANCARIAS',
                'grupo_id'  => 5
            ],
            [
                'conta'     => '0001',
                'descricao' => 'TRANSFERENCIA C/C PARA POUPANCA',
                'grupo_id'  => 6
            ],
            [
                'conta'     => '0002',
                'descricao' => 'TRANSFERENCIA POUPANCA PARA C/C',
                'grupo_id'  => 6
            ],
        ];
        foreach ($contas as $conta) {
            Conta::create($conta);
        };

    }
}

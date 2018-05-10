<?php

use Illuminate\Database\Seeder;

use WebCondom\Models\Balancetes\BalanceteLancamento;

class BalancetesLancamentosSeeder extends Seeder
{

    public function run()
    {
        $dados = [
            [
                'data_lancamento' 	=> '2018-04-01',
                'documento' 		=> '002',
                'historico'			=> 'RECEBIMENTO DE TAXAS CONDOMINIAIS DURANTE O PERÍODO',
                'valor'				=> '16725.35',
                'tipo'				=> 'Credito',
                'folha'				=> '',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '1',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-01',
                'documento' 		=> '002',
                'historico'			=> 'RECEBIMENTO DE MULTAS E JUROS',
                'valor'				=> '763.18',
                'tipo'				=> 'Credito',
                'folha'				=> '',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '2',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-07',
                'documento' 		=> '005',
                'historico'			=> 'SALÁRIO DE FUNCIONARIOS - HORAS EXTRAS - ADICIONAL NOTURNO',
                'valor'				=> '7896.77',
                'tipo'				=> 'Debito',
                'folha'				=> '11',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '4',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-07',
                'documento' 		=> '005',
                'historico'			=> 'VALE TRANSPORTE',
                'valor'				=> '236.21',
                'tipo'				=> 'Debito',
                'folha'				=> '11',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '5',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-10',
                'documento' 		=> '102030',
                'historico'			=> 'TAXA DE ADMINISTRAÇÃO',
                'valor'				=> '954',
                'tipo'				=> 'Debito',
                'folha'				=> '13',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '9',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-12',
                'documento' 		=> '136366',
                'historico'			=> 'CONSERVAÇÃO DE ELEVADORES - CONTRATO 106/16 ',
                'valor'				=> '659.14',
                'tipo'				=> 'Debito',
                'folha'				=> '12',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '11',
                'fornecedor_id'		=> '1'
            ],
            [
                'data_lancamento' 	=> '2018-04-10',
                'documento' 		=> '2360',
                'historico'			=> 'JARDINAGEM - CONSERTOS JARDINS SALAO DE FESTAS ',
                'valor'				=> '176',
                'tipo'				=> 'Debito',
                'folha'				=> '14',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '14',
                'fornecedor_id'		=> '2'
            ],
            [
                'data_lancamento' 	=> '2018-04-15',
                'documento' 		=> '02576',
                'historico'			=> 'COP FAC - MATERIAL DE ESCRITORIO E ACESSORIOS PORTARIA',
                'valor'				=> '77',
                'tipo'				=> 'Debito',
                'folha'				=> '16',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '10',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-15',
                'documento' 		=> '3251',
                'historico'			=> 'MATERIAL DE LIMPEZA, MAERIAL PRISCINA, MATERIAL JARDINAGEM',
                'valor'				=> '116.86',
                'tipo'				=> 'Debito',
                'folha'				=> '16',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '13',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-15',
                'documento' 		=> '003',
                'historico'			=> 'TARIFAS BANCARIAS',
                'valor'				=> '35.7',
                'tipo'				=> 'Debito',
                'folha'				=> '17',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '10',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-20',
                'documento' 		=> '136556',
                'historico'			=> 'TROCA DE PEÇAS DO ELEVADOR PRINCIPAL - RELE DA PORTA EXTERNA',
                'valor'				=> '398',
                'tipo'				=> 'Debito',
                'folha'				=> '18',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '11',
                'fornecedor_id'		=> '1'
            ],
            [
                'data_lancamento' 	=> '2018-04-15',
                'documento' 		=> '3675',
                'historico'			=> 'CPFL - ENERGIA ELETRICA',
                'valor'				=> '769.86',
                'tipo'				=> 'Debito',
                'folha'				=> '19',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '7',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-15',
                'documento' 		=> '2018/03',
                'historico'			=> 'SEMAE - AGUA E ESGOTO',
                'valor'				=> '239.7',
                'tipo'				=> 'Debito',
                'folha'				=> '20',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '8',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-15',
                'documento' 		=> '1678',
                'historico'			=> 'LIMPEZA E MANUTENÇÃO DA PISCINA',
                'valor'				=> '300',
                'tipo'				=> 'Debito',
                'folha'				=> '21',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '12',
                'fornecedor_id'		=> '2'
            ],
            [
                'data_lancamento' 	=> '2018-04-25',
                'documento' 		=> '004',
                'historico'			=> 'TROCA CAMERA PORTARIA EXTERNA',
                'valor'				=> '200',
                'tipo'				=> 'Debito',
                'folha'				=> '22',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '10',
                'fornecedor_id'		=> '3'
            ],
            [
                'data_lancamento' 	=> '2018-04-08',
                'documento' 		=> '1355',
                'historico'			=> 'TAXA DE MANUTENÇÃO DO SISTEMA WEBCONDOM',
                'valor'				=> '477',
                'tipo'				=> 'Debito',
                'folha'				=> '23',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '15',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-04-30',
                'documento' 		=> '000',
                'historico'			=> 'TRANSFERENCIA C/C PARA POUPANCA - APLICACAO FUNDO DE RESERVA',
                'valor'				=> '4000',
                'tipo'				=> 'Debito',
                'folha'				=> '',
                'balancete_id'		=> '24',
                'plano_contas_id'	=> '17',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-03-01',
                'documento' 		=> '002',
                'historico'			=> 'RECEBIMENTO DE CONDOMINIOS TAXAS E MULTAS',
                'valor'				=> '15000',
                'tipo'				=> 'Credito',
                'folha'				=> '',
                'balancete_id'		=> '23',
                'plano_contas_id'	=> '1',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-02-01',
                'documento' 		=> '002',
                'historico'			=> 'RECEBIMENTO DE CONDOMINIOS TAXAS E MULTAS',
                'valor'				=> '13000',
                'tipo'				=> 'Credito',
                'folha'				=> '',
                'balancete_id'		=> '21',
                'plano_contas_id'	=> '1',
                'fornecedor_id'		=> null
            ],
            [
                'data_lancamento' 	=> '2018-02-01',
                'documento' 		=> '002',
                'historico'			=> 'RECEBIMENTO DE CONDOMINIOS',
                'valor'				=> '17777',
                'tipo'				=> 'Credito',
                'folha'				=> '',
                'balancete_id'		=> '22',
                'plano_contas_id'	=> '1',
                'fornecedor_id'		=> null
            ]
        ];
        foreach ($dados as $dado) {
            BalanceteLancamento::create($dado);
        };
    }
}

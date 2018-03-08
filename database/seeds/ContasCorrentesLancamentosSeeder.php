<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Financeiros\ContaCorrenteLancamento;

class ContasCorrentesLancamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                'nota_fiscal'       => '',
                'parcela'           => '',
                'data'              => '2017-31-01',
                'documento'         => '',
                'tipo'              => 'C',
                'historico'         => 'SALDO INICIAL',
                'valor'             => '2000.00',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '16',
                'conta_corrente_id' => '11'
            ],
            [
                'nota_fiscal'       => '000123456',
                'parcela'           => '01',
                'data'              => '2018-01-05',
                'documento'         => '100211',
                'tipo'              => 'D',
                'historico'         => 'ELEVADORES OTIS',
                'valor'             => '236.67',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '10',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'nota_fiscal'       => '',
                'parcela'           => '',
                'data'              => '2018-01-05',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'COMPRA DE MATERIAL LIMPEZA',
                'valor'             => '90',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '12',
                'conta_corrente_id' => '11'
            ],
            [
                'nota_fiscal'       => '000000555',
                'parcela'           => '01',
                'data'              => '2018-01-10',
                'documento'         => '100212',
                'tipo'              => 'D',
                'historico'         => 'ELEVADORES ATLAS',
                'valor'             => '150',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '10',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'data'              => '2018-01-11',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '3169',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-01-11',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'TAXA DE ADM.',
                'valor'             => '937',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '9',
                'conta_corrente_id' => '11',
            ],
            [
                'nota_fiscal'       => '000001999',
                'parcela'           => '02',
                'data'              => '2018-01-20',
                'documento'         => '100215',
                'tipo'              => 'D',
                'historico'         => 'PRODUTOS DE LIMPEZA',
                'valor'             => '225',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '12',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'data'              => '2018-01-20',
                'documento'         => '999888',
                'tipo'              => 'D',
                'historico'         => 'CONTA DE LUZ',
                'valor'             => '868.27',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '7',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-01-30',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '2680',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '11'
            ],
            [
                'nota_fiscal'       => '000002321',
                'parcela'           => '01',
                'data'              => '2018-01-30',
                'documento'         => '100215',
                'tipo'              => 'D',
                'historico'         => 'EXTINTELE S.A.',
                'valor'             => '197',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '10',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '2'
            ],
            [
                'nota_fiscal'       => '000002000',
                'parcela'           => '01',
                'data'              => '2018-01-30',
                'documento'         => '100217',
                'tipo'              => 'D',
                'historico'         => 'PRODUTOS DE LIMPEZA',
                'valor'             => '211',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '12',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'data'              => '2018-02-01',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '3000',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-02-01',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'TAXA DE ADM.',
                'valor'             => '937',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '9',
                'conta_corrente_id' => '11',
            ],
            [
                'nota_fiscal'       => '000202020',
                'parcela'           => '01',
                'data'              => '2018-02-10',
                'documento'         => '100218',
                'tipo'              => 'D',
                'historico'         => 'PRODUTOS DE LIMPEZA',
                'valor'             => '36.79',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '12',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'data'              => '2018-02-10',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'CONTA DE AGUA E ESGOTO',
                'valor'             => '133',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '8',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-02-11',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '1000',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '11'
            ],
            [
                'nota_fiscal'       => '000123499',
                'parcela'           => '01',
                'data'              => '2018-02-11',
                'documento'         => '100219',
                'tipo'              => 'D',
                'historico'         => 'CLORO PARA PISCINA',
                'valor'             => '353',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '11',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'data'              => '2018-02-20',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'SALARIO FUNCIONARIOS',
                'valor'             => '5322.90',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '4',
                'conta_corrente_id' => '11'
            ],
            [
                'nota_fiscal'       => '000000500',
                'parcela'           => '01',
                'data'              => '2018-02-20',
                'documento'         => '100220',
                'tipo'              => 'D',
                'historico'         => 'MANUTENCAO SISTEMA CONDOM',
                'valor'             => '880',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '14',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '3'
            ],
            [
                'data'              => '2018-02-20',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'FERIAS E 13.SALARIO',
                'valor'             => '1200.00',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '6',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-02-20',
                'documento'         => '100222',
                'tipo'              => 'D',
                'historico'         => 'TX DE ADM.',
                'valor'             => '954',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '9',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-02-20',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '5069',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-02-22',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'TAXA DE ADM ',
                'valor'             => '937',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '9',
                'conta_corrente_id' => '11',
            ],
            [
                'data'              => '2018-03-03',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'SALARIO FUNCIONARIOS',
                'valor'             => '4500.90',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '4',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-03-03',
                'documento'         => '999666',
                'tipo'              => 'D',
                'historico'         => 'CONTA DE LUZ - CPFL',
                'valor'             => '763.77',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '7',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-03-03',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '2555',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '11'
            ],
            [
                'nota_fiscal'       => '000055440',
                'parcela'           => '01',
                'data'              => '2018-03-03',
                'documento'         => '100225',
                'tipo'              => 'D',
                'historico'         => 'RECARGA EXTINTOR.',
                'valor'             => '349',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '10',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '2'
            ],
            [
                'nota_fiscal'       => '000012000',
                'parcela'           => '01',
                'data'              => '2018-03-03',
                'documento'         => '100225',
                'tipo'              => 'D',
                'historico'         => 'MATERIAL DE LIMPEZA',
                'valor'             => '350',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '12',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'data'              => '2018-03-03',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'FERIAS E 13.SALARIO',
                'valor'             => '1750.00',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '6',
                'conta_corrente_id' => '11'
            ],
            [
                'nota_fiscal'       => '000055445',
                'parcela'           => '01',
                'data'              => '2018-01-03',
                'documento'         => '1001',
                'tipo'              => 'D',
                'historico'         => 'RECARGA EXTINTOR.',
                'valor'             => '5000',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '10',
                'conta_corrente_id' => '12',
                'fornecedor_id'     => '2'
            ],
            [
                'nota_fiscal'       => '000012009',
                'parcela'           => '01',
                'data'              => '2018-03-03',
                'documento'         => '100229',
                'tipo'              => 'D',
                'historico'         => 'MATERIAL DE ESCRITORIO',
                'valor'             => '176',
                'compensado'        => '1',
                'cheque'            => '1',
                'planodecontas_id'  => '12',
                'conta_corrente_id' => '11',
                'fornecedor_id'     => '1'
            ],
            [
                'data'              => '2018-01-03',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '8000',
                'compensado'        => '1',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '12'
            ],
            [
                'data'              => '2018-01-31',
                'documento'         => '002',
                'tipo'              => 'C',
                'historico'         => 'LIQ.DE COBRANCA',
                'valor'             => '3000',
                'compensado'        => '0',
                'cheque'            => '0',
                'planodecontas_id'  => '1',
                'conta_corrente_id' => '11'
            ],
            [
                'data'              => '2018-02-01',
                'documento'         => '',
                'tipo'              => 'D',
                'historico'         => 'TAXA DE ADM ',
                'valor'             => '1000',
                'compensado'        => '0',
                'cheque'            => '0',
                'planodecontas_id'  => '9',
                'conta_corrente_id' => '11',
            ],

        ];
        foreach ($dados as $dado) {
            contacorrentelancamento::create($dado);
        };
    }
}

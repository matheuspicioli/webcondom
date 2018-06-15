<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Financeiros\ContaCorrente;

class ContasCorrentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContaCorrente::Create([
            'id'                => '11',
            'condominio_id'     => '5',
            'codigo'            => '1',
            'banco_id'          => '7',
            'agencia'           => '2205-0',
            'conta'             => '003.13.480-5',
            'inicio'            => '2017-12-15',
            'principal'         => '1',
            'nome'              => 'COND.EDIF.SOLAR',
            'boleto_agencia'    => '2205',
            'boleto_conta'      => '0034805',
            'cedente'           => '7891157',
            'carteira'          => 'RG',
            'aceite'            => '0',
            'nosso_numero'      => '148200550022012345',
            'prazo_baixa'       => '60',
            'multa'             => '2',
            'juros'             => '0.0333',
            'tipo_juros'        => 'AD',
            'protestar'         => '0',
            'mensagem1'         => 'APOS VENCIMENTO COBRAR MULTAS E JUROS.',
            'mensagem2'         => 'NAO RECEBER APOS 60 DIAS DO VENCIMENTO.',
            'mensagem3'         => 'MULTA 2% + JUROS DE 0,0333% AO DIA.',
            'mensagem4'         => '** FELIZ PASCOA. **']);

        ContaCorrente::Create([
            'id'                => '12',
            'condominio_id'     => '6',
            'codigo'            => '1',
            'banco_id'          => '8',
            'agencia'           => '3815-0',
            'conta'             => '15.238-7',
            'inicio'            => '2018-01-10',
            'principal'         => '1',
            'nome'              => 'RES.RIO TEJO',
            'boleto_agencia'    => '3815',
            'boleto_conta'      => '0152387',
            'cedente'           => '3780123',
            'carteira'          => '101',
            'aceite'            => '0',
            'nosso_numero'      => '7001200557123',
            'prazo_baixa'       => '30',
            'multa'             => '2',
            'juros'             => '0.0333',
            'tipo_juros'        => 'AD',
            'protestar'         => '1',
            'mensagem1'         => 'APOS VENCIMENTO COBRAR MULTAS E JUROS.',
            'mensagem2'         => 'NAO RECEBER APOS 60 DIAS DO VENCIMENTO.',
            'mensagem3'         => 'MULTA 2% + JUROS DE 0,0333% AO DIA.',
            'mensagem4'         => '** FELIZ PASCOA **']);
    }
}

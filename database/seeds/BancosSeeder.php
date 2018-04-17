<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Financeiros\Banco;

class BancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banco::Create([
            'id'                => '7',
            'codigo_banco'      => '1040',
            'nome_banco'        => 'CX.ECON.FEDERAL',
            'CNAB'              => '240',
            'carteira'          => 'RG',
            'tamanho_agencia'   => '6',
            'tamanho_conta'     => '17',
            'tamanho_cedente'   => '17',
            'tamanho_nossonumero'=> '15',
            'local_pagamento'   => 'Pague preferencialmente nas Casas  Lotericas até o valor limite.',
            'mensagem'          => 'Sr.Caixa, observe atentamente as mensagens abaixo:',
            'mascara_cedente'   => '9999 / 999999-9',
            'mascara_nossonumero'=> '99999999999999999-9',
            'linha_valor'       => '0',
            'coluna_valor'      => '52',
            'linha_extenso1'    => '1',
            'coluna_extenso1'   => '10',
            'linha_extenso2'    => '3',
            'coluna_extenso2'   => '1',
            'linha_nominal'     => '4',
            'coluna_nominal'    => '3',
            'linha_dia'         => '6',
            'coluna_dia'        => '43',
            'linha_mes'         => '6',
            'coluna_mes'        => '49',
            'linha_ano'         => '6',
            'coluna_ano'        => '62']);

        Banco::Create([
            'id'                 => '8',
            'codigo_banco'       => '0337',
            'nome_banco'         => 'SANTANDER',
            'CNAB'               => '240',
            'carteira'           => '101',
            'tamanho_agencia'    => '4',
            'tamanho_conta'      => '7',
            'tamanho_cedente'    => '7',
            'tamanho_nossonumero'=> '12',
            'local_pagamento'    => 'Pagavel em qualquer banco até o vencimento.',
            'mensagem'           => 'Sr.Caixa, observe atentamente as mensagens abaixo:',
            'mascara_cedente'    => '9999 / 9999999',
            'mascara_nossonumero'=> '999999999999-9',
            'linha_valor'        => '0',
            'coluna_valor'       => '52',
            'linha_extenso1'     => '1',
            'coluna_extenso1'    => '10',
            'linha_extenso2'     => '3',
            'coluna_extenso2'    => '1',
            'linha_nominal'      => '4',
            'coluna_nominal'     => '3',
            'linha_dia'          => '6',
            'coluna_dia'         => '43',
            'linha_mes'          => '6',
            'coluna_mes'         => '49',
            'linha_ano'          => '6',
            'coluna_ano'         => '62']);

        Banco::Create([
            'id'                => '9',
            'codigo_banco'      => '0019',
            'nome_banco'        => 'BANCO DO BRASIL',
            'CNAB'              => '240',
            'carteira'          => '18/019',
            'tamanho_agencia'   => '6',
            'tamanho_conta'     => '8',
            'tamanho_cedente'   => '7',
            'tamanho_nossonumero'=> '10',
            'local_pagamento'   => 'Pague preferencialmente nas agencias do Banco do Brasil.',
            'mensagem'          => 'Sr.Caixa, observe atentamente as mensagens abaixo:',
            'Logotipo'          => 'C:\Sistemas\Metrop\bancos\bb.jpg',
            'mascara_cedente'   => '9999-9 / 999999-9',
            'mascara_nossonumero'=> '99/99999999999999-9',
            'linha_valor'       => '0',
            'coluna_valor'      => '52',
            'linha_extenso1'    => '1',
            'coluna_extenso1'   => '10',
            'linha_extenso2'    => '3',
            'coluna_extenso2'   => '1',
            'linha_nominal'     => '4',
            'coluna_nominal'    => '3',
            'linha_dia'         => '6',
            'coluna_dia'        => '43',
            'linha_mes'         => '6',
            'coluna_mes'        => '49',
            'linha_ano'         => '6',
            'coluna_ano'        => '62']);

        Banco::Create([
            'id'                => '10',
            'codigo_banco'      => '2372',
            'nome_banco'        => 'BRADESCO S/A',
            'CNAB'              => '240',
            'carteira'          => '09',
            'tamanho_agencia'   => '6',
            'tamanho_conta'     => '9',
            'tamanho_cedente'   => '9',
            'tamanho_nossonumero'=>'11',
            'local_pagamento'   => 'Pague preferencialmente na Rede Bradesco ou Bradesco Express',
            'mensagem'          => 'Sr.Caixa, observe atentamente as mensagens abaixo:',
            'Logotipo'          => 'C:\Sistemas\Metrop\bancos\bradesco.jpg',
            'mascara_cedente'   => '9999 / 9999999-9',
            'mascara_nossonumero'=> '99/99999999999-9',
            'linha_valor'       => '0',
            'coluna_valor'      => '52',
            'linha_extenso1'    => '1',
            'coluna_extenso1'   => '10',
            'linha_extenso2'    => '3',
            'coluna_extenso2'   => '1',
            'linha_nominal'     => '4',
            'coluna_nominal'    => '3',
            'linha_dia'         => '6',
            'coluna_dia'        => '43',
            'linha_mes'         => '6',
            'coluna_mes'        => '49',
            'linha_ano'         => '6',
            'coluna_ano'        => '62']);
    }
}
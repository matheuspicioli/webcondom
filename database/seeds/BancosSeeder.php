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
            'codigoBanco'       => '1040',
            'nomebanco'         => 'CX.ECON.FEDERAL',
            'CNAB'              => '240',
            'carteira'          => 'RG',
            'tamAgencia'        => '6',
            'tamConta'          => '17',
            'tamCedente'        => '17',
            'tamNossoNumero'    =>  '15',
            'localpagamento'    => 'Pague preferencialmente nas Casas  Lotericas até o valor limite.',
            'mensagem'          => 'Sr.Caixa, observe atentamente as mensagens abaixo:',
            'Logotipo'          => 'C:\Sistemas\Metrop\bancos\caixa.jpg',
            'mskCedente'        => '9999 / 999999-9',
            'mskNossoNumero'    => '99999999999999999-9',
            'l_valor'           => '0',
            'c_valor'           => '52',
            'l_extenso1'        => '1',
            'c_extenso1'        => '10',
            'l_extenso2'        => '3',
            'c_extenso2'        => '1',
            'l_nominal'         => '4',
            'c_nominal'         => '3',
            'l_dia'             => '6',
            'c_dia'             => '43',
            'l_mes'             => '6',
            'c_mes'             => '49',
            'l_ano'             => '6',
            'c_ano'             => '62']);

        Banco::Create([
            'id'                => '8',
            'codigoBanco'       => '0337',
            'nomebanco'         => 'SANTANDER',
            'CNAB'              => '240',
            'carteira'          => '101',
            'tamAgencia'        => '4',
            'tamConta'          => '7',
            'tamCedente'        => '7',
            'tamNossoNumero'    =>  '12',
            'localpagamento'    => 'Pagavel em qualquer banco até o vencimento.',
            'mensagem'          => 'Sr.Caixa, observe atentamente as mensagens abaixo:',
            'Logotipo'          => 'C:\Sistemas\Metrop\bancos\santander.jpg',
            'mskCedente'        => '9999 / 9999999',
            'mskNossoNumero'    => '999999999999-9',
            'l_valor'           => '0',
            'c_valor'           => '52',
            'l_extenso1'        => '1',
            'c_extenso1'        => '10',
            'l_extenso2'        => '3',
            'c_extenso2'        => '1',
            'l_nominal'         => '4',
            'c_nominal'         => '3',
            'l_dia'             => '6',
            'c_dia'             => '43',
            'l_mes'             => '6',
            'c_mes'             => '49',
            'l_ano'             => '6',
            'c_ano'             => '62']);
   }
}
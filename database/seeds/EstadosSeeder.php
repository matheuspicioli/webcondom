<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     */
    public function run()
    {
        Estado::create(['descricao' => 'ACRE', 'sigla' => 'AC', 'codigoIbge' => '12']);
        Estado::create(['descricao' => 'ALAGOAS', 'sigla' => 'AL', 'codigoIbge' => '27']);
        Estado::create(['descricao' => 'AMAPÁ', 'sigla' => 'AP', 'codigoIbge' => '16']);
        Estado::create(['descricao' => 'AMAZONAS', 'sigla' => 'AM', 'codigoIbge' => '13']);
        Estado::create(['descricao' => 'BAHIA', 'sigla' => 'BA', 'codigoIbge' => '29']);
        Estado::create(['descricao' => 'CEARÁ', 'sigla' => 'CE', 'codigoIbge' => '23']);
        Estado::create(['descricao' => 'DISTRITO FEDERAL', 'sigla' => 'DF', 'codigoIbge' => '53']);
        Estado::create(['descricao' => 'ESPÍRITO SANTO', 'sigla' => 'ES', 'codigoIbge' => '32']);
        Estado::create(['descricao' => 'GOIÁS', 'sigla' => 'GO', 'codigoIbge' => '52']);
        Estado::create(['descricao' => 'MARANHÃO', 'sigla' => 'MA', 'codigoIbge' => '21']);
        Estado::create(['descricao' => 'MATO GROSSO', 'sigla' => 'MT', 'codigoIbge' => '51']);
        Estado::create(['descricao' => 'MATO GROSSO DO SUL', 'sigla' => 'MS', 'codigoIbge' => '78']);
        Estado::create(['descricao' => 'MINAS GERAIS', 'sigla' => 'MG', 'codigoIbge' => '31']);
        Estado::create(['descricao' => 'PARÁ', 'sigla' => 'PA', 'codigoIbge' => '15']);
        Estado::create(['descricao' => 'PARAIBA', 'sigla' => 'PB', 'codigoIbge' => '25']);
        Estado::create(['descricao' => 'PARANA', 'sigla' => 'PR', 'codigoIbge' => '41']);
        Estado::create(['descricao' => 'PERNAMBUCO', 'sigla' => 'PE', 'codigoIbge' => '26']);
        Estado::create(['descricao' => 'PIAUÍ­', 'sigla' => 'PI', 'codigoIbge' => '22']);
        Estado::create(['descricao' => 'RIO DE JANEIRO', 'sigla' => 'RJ', 'codigoIbge' => '33']);
        Estado::create(['descricao' => 'RIO GRANDE DO NORTE', 'sigla' => 'RN', 'codigoIbge' => '24']);
        Estado::create(['descricao' => 'RIO GRANDE DO SUL', 'sigla' => 'RS', 'codigoIbge' => '43']);
        Estado::create(['descricao' => 'RONDÔNIA', 'sigla' => 'RO', 'codigoIbge' => '11']);
        Estado::create(['descricao' => 'RORAIMA', 'sigla' => 'RR', 'codigoIbge' => '14']);
        Estado::create(['descricao' => 'SANTA CATARINA', 'sigla' => 'SC', 'codigoIbge' => '42']);
        Estado::create(['descricao' => 'SÃO PAULO', 'sigla' => 'SP', 'codigoIbge' => '35']);
        Estado::create(['descricao' => 'SERGIPE', 'sigla' => 'SE', 'codigoIbge' => '28']);
        Estado::create(['descricao' => 'TOCANTINS', 'sigla' => 'TO', 'codigoIbge' => '17']);
    }
}

<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['descricao' => 'ACRE', 'sigla' => 'AC', 'codigo_ibge' => '12']);
        Estado::create(['descricao' => 'ALAGOAS', 'sigla' => 'AL', 'codigo_ibge' => '27']);
        Estado::create(['descricao' => 'AMAPÁ', 'sigla' => 'AP', 'codigo_ibge' => '16']);
        Estado::create(['descricao' => 'AMAZONAS', 'sigla' => 'AM', 'codigo_ibge' => '13']);
        Estado::create(['descricao' => 'BAHIA', 'sigla' => 'BA', 'codigo_ibge' => '29']);
        Estado::create(['descricao' => 'CEARÁ', 'sigla' => 'CE', 'codigo_ibge' => '23']);
        Estado::create(['descricao' => 'DISTRITO FEDERAL', 'sigla' => 'DF', 'codigo_ibge' => '53']);
        Estado::create(['descricao' => 'ESPÍRITO SANTO', 'sigla' => 'ES', 'codigo_ibge' => '32']);
        Estado::create(['descricao' => 'GOIÁS', 'sigla' => 'GO', 'codigo_ibge' => '52']);
        Estado::create(['descricao' => 'MARANHÃO', 'sigla' => 'MA', 'codigo_ibge' => '21']);
        Estado::create(['descricao' => 'MATO GROSSO', 'sigla' => 'MT', 'codigo_ibge' => '51']);
        Estado::create(['descricao' => 'MATO GROSSO DO SUL', 'sigla' => 'MS', 'codigo_ibge' => '78']);
        Estado::create(['descricao' => 'MINAS GERAIS', 'sigla' => 'MG', 'codigo_ibge' => '31']);
        Estado::create(['descricao' => 'PARÁ', 'sigla' => 'PA', 'codigo_ibge' => '15']);
        Estado::create(['descricao' => 'PARAIBA', 'sigla' => 'PB', 'codigo_ibge' => '25']);
        Estado::create(['descricao' => 'PARANA', 'sigla' => 'PR', 'codigo_ibge' => '41']);
        Estado::create(['descricao' => 'PERNAMBUCO', 'sigla' => 'PE', 'codigo_ibge' => '26']);
        Estado::create(['descricao' => 'PIAUÍ­', 'sigla' => 'PI', 'codigo_ibge' => '22']);
        Estado::create(['descricao' => 'RIO DE JANEIRO', 'sigla' => 'RJ', 'codigo_ibge' => '33']);
        Estado::create(['descricao' => 'RIO GRANDE DO NORTE', 'sigla' => 'RN', 'codigo_ibge' => '24']);
        Estado::create(['descricao' => 'RIO GRANDE DO SUL', 'sigla' => 'RS', 'codigo_ibge' => '43']);
        Estado::create(['descricao' => 'RONDÔNIA', 'sigla' => 'RO', 'codigo_ibge' => '11']);
        Estado::create(['descricao' => 'RORAIMA', 'sigla' => 'RR', 'codigo_ibge' => '14']);
        Estado::create(['descricao' => 'SANTA CATARINA', 'sigla' => 'SC', 'codigo_ibge' => '42']);
        Estado::create(['descricao' => 'SÃO PAULO', 'sigla' => 'SP', 'codigo_ibge' => '35']);
        Estado::create(['descricao' => 'SERGIPE', 'sigla' => 'SE', 'codigo_ibge' => '28']);
        Estado::create(['descricao' => 'TOCANTINS', 'sigla' => 'TO', 'codigo_ibge' => '17']);
    }
}

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
        Estado::Create(['EstadoID' => '1', 'Descricao' => 'ACRE', 'Sigla' => 'AC', 'CodigoIBGE' => '12']);
        Estado::Create(['EstadoID' => '2', 'Descricao' => 'ALAGOAS', 'Sigla' => 'AL', 'CodigoIBGE' => '27']);
        Estado::Create(['EstadoID' => '3', 'Descricao' => 'AMAPÁ', 'Sigla' => 'AP', 'CodigoIBGE' => '16']);
        Estado::Create(['EstadoID' => '4', 'Descricao' => 'AMAZONAS', 'Sigla' => 'AM', 'CodigoIBGE' => '13']);
        Estado::Create(['EstadoID' => '5', 'Descricao' => 'BAHIA', 'Sigla' => 'BA', 'CodigoIBGE' => '29']);
        Estado::Create(['EstadoID' => '6', 'Descricao' => 'CEARÁ', 'Sigla' => 'CE', 'CodigoIBGE' => '23']);
        Estado::Create(['EstadoID' => '7', 'Descricao' => 'DISTRITO FEDERAL', 'Sigla' => 'DF', 'CodigoIBGE' => '53']);
        Estado::Create(['EstadoID' => '8', 'Descricao' => 'ESPÍRITO SANTO', 'Sigla' => 'ES', 'CodigoIBGE' => '32']);
        Estado::Create(['EstadoID' => '9', 'Descricao' => 'GOIÁS', 'Sigla' => 'GO', 'CodigoIBGE' => '52']);
        Estado::Create(['EstadoID' => '10', 'Descricao' => 'MARANHÃO', 'Sigla' => 'MA', 'CodigoIBGE' => '21']);
        Estado::Create(['EstadoID' => '11', 'Descricao' => 'MATO GROSSO', 'Sigla' => 'MT', 'CodigoIBGE' => '51']);
        Estado::Create(['EstadoID' => '12', 'Descricao' => 'MATO GROSSO DO SUL', 'Sigla' => 'MS', 'CodigoIBGE' => '78']);
        Estado::Create(['EstadoID' => '13', 'Descricao' => 'MINAS GERAIS', 'Sigla' => 'MG', 'CodigoIBGE' => '31']);
        Estado::Create(['EstadoID' => '14', 'Descricao' => 'PARÁ', 'Sigla' => 'PA', 'CodigoIBGE' => '15']);
        Estado::Create(['EstadoID' => '15', 'Descricao' => 'PARAIBA', 'Sigla' => 'PB', 'CodigoIBGE' => '25']);
        Estado::Create(['EstadoID' => '16', 'Descricao' => 'PARANA', 'Sigla' => 'PR', 'CodigoIBGE' => '41']);
        Estado::Create(['EstadoID' => '17', 'Descricao' => 'PERNAMBUCO', 'Sigla' => 'PE', 'CodigoIBGE' => '26']);
        Estado::Create(['EstadoID' => '18', 'Descricao' => 'PIAUÍ­', 'Sigla' => 'PI', 'CodigoIBGE' => '22']);
        Estado::Create(['EstadoID' => '19', 'Descricao' => 'RIO DE JANEIRO', 'Sigla' => 'RJ', 'CodigoIBGE' => '33']);
        Estado::Create(['EstadoID' => '20', 'Descricao' => 'RIO GRANDE DO NORTE', 'Sigla' => 'RN', 'CodigoIBGE' => '24']);
        Estado::Create(['EstadoID' => '21', 'Descricao' => 'RIO GRANDE DO SUL', 'Sigla' => 'RS', 'CodigoIBGE' => '43']);
        Estado::Create(['EstadoID' => '22', 'Descricao' => 'RONDÔNIA', 'Sigla' => 'RO', 'CodigoIBGE' => '11']);
        Estado::Create(['EstadoID' => '23', 'Descricao' => 'RORAIMA', 'Sigla' => 'RR', 'CodigoIBGE' => '14']);
        Estado::Create(['EstadoID' => '24', 'Descricao' => 'SANTA CATARINA', 'Sigla' => 'SC', 'CodigoIBGE' => '42']);
        Estado::Create(['EstadoID' => '25', 'Descricao' => 'SÃO PAULO', 'Sigla' => 'SP', 'CodigoIBGE' => '35']);
        Estado::Create(['EstadoID' => '26', 'Descricao' => 'SERGIPE', 'Sigla' => 'SE', 'CodigoIBGE' => '28']);
        Estado::Create(['EstadoID' => '27', 'Descricao' => 'TOCANTINS', 'Sigla' => 'TO', 'CodigoIBGE' => '17']);
    }
}

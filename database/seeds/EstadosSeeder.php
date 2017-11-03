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
        Estado::Create(['EstadoID' => '1', 'Descricao' => 'AMAPÁ', 'Sigla' => 'AP', 'CodigoIBGE' => '16']);
        Estado::Create(['EstadoID' => '2', 'Descricao' => 'PERNAMBUCO', 'Sigla' => 'PE', 'CodigoIBGE' => '26']);
        Estado::Create(['EstadoID' => '3', 'Descricao' => 'MINAS GERAIS', 'Sigla' => 'MG', 'CodigoIBGE' => '31']);
        Estado::Create(['EstadoID' => '4', 'Descricao' => 'ALAGOAS', 'Sigla' => 'AL', 'CodigoIBGE' => '27']);
        Estado::Create(['EstadoID' => '5', 'Descricao' => 'MATO GROSSO DO SUL', 'Sigla' => 'MS', 'CodigoIBGE' => '78']);
        Estado::Create(['EstadoID' => '6', 'Descricao' => 'PARAIBA', 'Sigla' => 'PB', 'CodigoIBGE' => '25']);
        Estado::Create(['EstadoID' => '7', 'Descricao' => 'RONDÔNIA', 'Sigla' => 'RO', 'CodigoIBGE' => '11']);
        Estado::Create(['EstadoID' => '8', 'Descricao' => 'SERGIPE', 'Sigla' => 'SE', 'CodigoIBGE' => '28']);
        Estado::Create(['EstadoID' => '9', 'Descricao' => 'MARANHÃO', 'Sigla' => 'MA', 'CodigoIBGE' => '21']);
        Estado::Create(['EstadoID' => '10', 'Descricao' => 'BAHIA', 'Sigla' => 'BA', 'CodigoIBGE' => '29']);
        Estado::Create(['EstadoID' => '11', 'Descricao' => 'RIO GRANDE DO NORTE', 'Sigla' => 'RN', 'CodigoIBGE' => '24']);
        Estado::Create(['EstadoID' => '12', 'Descricao' => 'PARÁ', 'Sigla' => 'PA', 'CodigoIBGE' => '15']);
        Estado::Create(['EstadoID' => '13', 'Descricao' => 'MATO GROSSO', 'Sigla' => 'MT', 'CodigoIBGE' => '51']);
        Estado::Create(['EstadoID' => '14', 'Descricao' => 'RIO DE JANEIRO', 'Sigla' => 'RJ', 'CodigoIBGE' => '33']);
        Estado::Create(['EstadoID' => '15', 'Descricao' => 'GOIÁS', 'Sigla' => 'GO', 'CodigoIBGE' => '52']);
        Estado::Create(['EstadoID' => '16', 'Descricao' => 'SANTA CATARINA', 'Sigla' => 'SC', 'CodigoIBGE' => '42']);
        Estado::Create(['EstadoID' => '17', 'Descricao' => 'ACRE', 'Sigla' => 'AC', 'CodigoIBGE' => '12']);
        Estado::Create(['EstadoID' => '18', 'Descricao' => 'RIO GRANDE DO SUL', 'Sigla' => 'RS', 'CodigoIBGE' => '43']);
        Estado::Create(['EstadoID' => '19', 'Descricao' => 'TOCANTINS', 'Sigla' => 'TO', 'CodigoIBGE' => '17']);
        Estado::Create(['EstadoID' => '20', 'Descricao' => 'CEARÁ', 'Sigla' => 'CE', 'CodigoIBGE' => '23']);
        Estado::Create(['EstadoID' => '21', 'Descricao' => 'PIAUÍ­', 'Sigla' => 'PI', 'CodigoIBGE' => '22']);
        Estado::Create(['EstadoID' => '22', 'Descricao' => 'RORAIMA', 'Sigla' => 'RR', 'CodigoIBGE' => '14']);
        Estado::Create(['EstadoID' => '23', 'Descricao' => 'DISTRITO FEDERAL', 'Sigla' => 'DF', 'CodigoIBGE' => '53']);
        Estado::Create(['EstadoID' => '24', 'Descricao' => 'ESPÍRITO SANTO', 'Sigla' => 'ES', 'CodigoIBGE' => '32']);
        Estado::Create(['EstadoID' => '25', 'Descricao' => 'AMAZONAS', 'Sigla' => 'AM', 'CodigoIBGE' => '13']);
        Estado::Create(['EstadoID' => '26', 'Descricao' => 'SÃO PAULO', 'Sigla' => 'SP', 'CodigoIBGE' => '35']);
    }
}

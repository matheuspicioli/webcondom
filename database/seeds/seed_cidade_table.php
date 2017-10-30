<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Cidade;

class seed_cidade_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('Cidades')->delete();

      Cidade::Create([ 'CidadeID' => '1', 'Descricao' => 'SAO JOSE DO RIO PRETO',  'CodigoIBGE' => '3549805',  'EstadoCOD' => '26']);
      Cidade::Create([ 'CidadeID' => '2', 'Descricao' => 'RIO DE JANEIRO',  'CodigoIBGE' => '3304557',  'EstadoCOD' => '14']);
    }
}

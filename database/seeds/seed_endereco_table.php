<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Endereco;

class seed_endereco_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('Enderecos')->delete();

      Endereco::Create([ 'EnderecoID' => '1', 'Logradouro' => 'R. PE.CLEMENTE M.SEGURA',  'Numero' => '355', 'CEP' => '15085480', 'Complemento' =>'bl.2 apto 605', 'CidadeCOD' => '1' ]);

    }
}

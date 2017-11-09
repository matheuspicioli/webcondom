<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Condominios\Condominio;

class CondominiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condominio::Create([
            'id' => '5',
            'nome' => 'CONDOMINIO EDIFICIO SOLAR MEDITERRANEO',
            'apelido' => 'SOLAR',
            'telefone' => '1733221100',
            'celular' => '17998765432',
            'unidades' => '12',
            'multa' => '2',
            'juros' => '0.0333',
            'tipoJuros' => 'AD',
            'temGas' => '1',
            'valorGas' => '8.35',
            'endereco_id' => '2',
            'sindico_id' => '4']);

        Condominio::Create([
            'id' => '6',
            'nome' => 'RESIDENCIAL SPAZIO RIO TEJO',
            'apelido' => 'RIO TEJO',
            'telefone' => '1732321199',
            'celular' => '17998760000',
            'unidades' => '144',
            'multa' => '2',
            'juros' => '0.0333',
            'tipoJuros' => 'AD',
            'temGas' => '0',
            'endereco_id' => '1',
            'sindico_id' => '3']);

    }
}
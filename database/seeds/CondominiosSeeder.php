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
            'CondominioID' => '5',
            'Nome' => 'CONDOMINIO EDIFICIO SOLAR MEDITERRANEO',
            'Apelido' => 'SOLAR',
            'Telefone' => '1733221100',
            'Celular' => '17998765432',
            'Unidades' => '12',
            'Multa' => '2',
            'Juros' => '0.0333',
            'TipoJuros' => 'AD',
            'TemGas' => '1',
            'ValorGas' => '8.35',
            'EnderecoCOD' => '2',
            'SindicoCOD' => '4']);

        Condominio::Create([
            'CondominioID' => '6',
            'Nome' => 'RESIDENCIAL SPAZIO RIO TEJO',
            'Apelido' => 'RIO TEJO',
            'Telefone' => '1732321199',
            'Celular' => '17998760000',
            'Unidades' => '144',
            'Multa' => '2',
            'Juros' => '0.0333',
            'TipoJuros' => 'AD',
            'TemGas' => '0',
            'EnderecoCOD' => '1',
            'SindicoCOD' => '3']);

    }
}

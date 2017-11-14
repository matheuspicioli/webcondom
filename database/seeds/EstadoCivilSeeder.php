<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Diversos\EstadoCivil;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoCivil::Create(['Id' => '1', 'Descricao' => 'SOLTEIRO']);
        EstadoCivil::Create(['Id' => '2', 'Descricao' => 'CASADO']);
        EstadoCivil::Create(['Id' => '3', 'Descricao' => 'DESQUITADO']);
    }
}

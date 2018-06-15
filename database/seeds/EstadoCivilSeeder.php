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
        EstadoCivil::create(['descricao' => 'SOLTEIRO', 'exige_conjuge' => '0']);
        EstadoCivil::create(['descricao' => 'CASADO', 'exige_conjuge' => '1']);
        EstadoCivil::create(['descricao' => 'DESQUITADO', 'exige_conjuge' => '0']);
    }
}

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
        EstadoCivil::Create(['Descricao' => 'SOLTEIRO', 'ExigeConjuge' => '0']);
        EstadoCivil::Create(['Descricao' => 'CASADO', 'ExigeConjuge' => '1']);
        EstadoCivil::Create(['Descricao' => 'DESQUITADO', 'ExigeConjuge' => '0']);
    }
}

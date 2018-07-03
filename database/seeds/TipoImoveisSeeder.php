<?php

use Illuminate\Database\Seeder;

class TipoImoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \WebCondom\Models\Diversos\TipoImovel::create(['descricao' => 'APARTAMENTO']);
        \WebCondom\Models\Diversos\TipoImovel::create(['descricao' => 'CASA']);
    }
}

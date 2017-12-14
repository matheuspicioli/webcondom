<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Diversos\Setor;

class SetoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setor::create(['descricao' => 'COBRANÇA']);
        sETOR::create(['descricao' => 'VENDAS']);

    }
}

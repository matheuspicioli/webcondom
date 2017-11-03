<?php

use Illuminate\Database\Seeder;

class CondominiosTaxasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WebCondom\Models\Condominios\CondominioTaxa::class, 10)->create();
    }
}

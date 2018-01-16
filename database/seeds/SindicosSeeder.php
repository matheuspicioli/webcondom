<?php

use Illuminate\Database\Seeder;

class SindicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WebCondom\Models\Condominios\Sindico::class, 31)->create();
    }
}

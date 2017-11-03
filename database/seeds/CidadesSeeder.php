<?php

use Illuminate\Database\Seeder;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = WebCondom\Models\Enderecos\Estado::all();
        factory(WebCondom\Models\Enderecos\Cidade::class, 50)->create()->each(function($cidade) use ($estados){
             $estado = $estados->random();
             $cidade->Estado()->associate($estado);
             $cidade->save();
        });
    }
}

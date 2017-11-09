<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Cidade;

class CidadesSeeder extends Seeder
{
    public function run()
    {
        Cidade::Create([
                        'descricao'  => 'SAO JOSE DO RIO PRETO',
                        'codigoIbge' => '3549805',
                        'estado_id'  => '25']);

        $estados = WebCondom\Models\Enderecos\Estado::all();
        factory(WebCondom\Models\Enderecos\Cidade::class, 49)->create()->each(function($cidade) use ($estados){
             $estado = $estados->random();
             $cidade->estado()->associate($estado);
             $cidade->save();
        });
    }
}

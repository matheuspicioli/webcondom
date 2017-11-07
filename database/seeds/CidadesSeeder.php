<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Cidade;

class CidadesSeeder extends Seeder
{
    public function run()
    {
        Cidade::Create([
                        'CidadeID'   => '1',
                        'Descricao'  => 'SAO JOSE DO RIO PRETO',
                        'CodigoIBGE' => '3549805',
                        'EstadoCOD'  => '25']);

        $estados = WebCondom\Models\Enderecos\Estado::all();
        factory(WebCondom\Models\Enderecos\Cidade::class, 49)->create()->each(function($cidade) use ($estados){
             $estado = $estados->random();
             $cidade->Estado()->associate($estado);
             $cidade->save();
        });
    }
}

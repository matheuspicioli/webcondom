<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Endereco;

class EnderecosSeeder extends Seeder
{
    public function run()
    {
        Endereco::Create([
            'EnderecoID' => '1',
            'Logradouro' => 'RUA P.CLEMENTE MARTON SEGURA',
            'Numero' => '350',
            'CEP' => '15085480',
            'Complemento' => '',
            'Bairro' => 'HIGIENOPOLIS',
            'CidadeCOD' => '1']);

        $cidades = WebCondom\Models\Enderecos\Cidade::all();
        factory(WebCondom\Models\Enderecos\Endereco::class, 9)->create()->each(function ($endereco) use ($cidades) {
            $cidade = $cidades->random();
            $endereco->Cidade()->associate($cidade);
            $endereco->save();
        });
    }
}

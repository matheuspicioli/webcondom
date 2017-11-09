<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Endereco;

class EnderecosSeeder extends Seeder
{
    public function run()
    {
        Endereco::Create([
            'logradouro'    => 'RUA P.CLEMENTE MARTON SEGURA',
            'numero'        => '350',
            'cep'           => '15085480',
            'complemento'   => '',
            'bairro'        => 'HIGIENOPOLIS',
            'cidade_id'     => '1']);

        $cidades = WebCondom\Models\Enderecos\Cidade::all();
        factory(WebCondom\Models\Enderecos\Endereco::class, 9)->create()->each(function ($endereco) use ($cidades) {
            $cidade = $cidades->random();
            $endereco->cidade()->associate($cidade);
            $endereco->save();
        });
    }
}

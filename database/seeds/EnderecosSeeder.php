<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Enderecos\Endereco;

class EnderecosSeeder extends Seeder
{
    public function run()
    {
        Endereco::Create([
            'cep'           => '15085480',
            'logradouro'    => 'RUA P.CLEMENTE MARTON SEGURA',
            'numero'        => '350',
            'complemento'   => '',
            'bairro'        => 'HIGIENOPOLIS',
            'cidade_id'     => '1']);

        Endereco::Create([
            'cep'           => '15014140',
            'logradouro'    => 'AV.MURCHID HOMSI',
            'numero'        => '8752',
            'complemento'   => '',
            'bairro'        => 'SANTA CRUZ',
            'cidade_id'     => '1']);

        Endereco::Create([
            'cep'           => '15015025',
            'logradouro'    => 'RUA PEDRO AMARAL',
            'numero'        => '3274',
            'complemento'   => 'APTO 101',
            'bairro'        => 'CENTRO',
            'cidade_id'     => '1']);

        Endereco::Create([
            'cep'           => '15018050',
            'logradouro'    => 'AV. ALBERTO ANDALO',
            'numero'        => '3555',
            'complemento'   => '',
            'bairro'        => 'ESPLANADA',
            'cidade_id'     => '1']);

        $cidades = WebCondom\Models\Enderecos\Cidade::all();
        factory(WebCondom\Models\Enderecos\Endereco::class, 9)->create()->each(function ($endereco) use ($cidades) {
            $cidade = $cidades->random();
            $endereco->cidade()->associate($cidade);
            $endereco->save();
        });
    }
}

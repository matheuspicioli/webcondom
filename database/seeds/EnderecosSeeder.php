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

        Endereco::Create([
            'logradouro'    => 'AV.ADOLFO LUTZ',
            'numero'        => '875',
            'cep'           => '15014140',
            'complemento'   => '',
            'bairro'        => 'SANTA CRUZ',
            'cidade_id'     => '1']);

        Endereco::Create([
            'logradouro'    => 'RUA PEDRO AMARAL',
            'numero'        => '3274',
            'cep'           => '15015025',
            'complemento'   => 'APTO 101',
            'bairro'        => 'CENTRO',
            'cidade_id'     => '1']);

        Endereco::Create([
            'logradouro'    => 'AV. ALBERTO ANDALO',
            'numero'        => '3555',
            'cep'           => '15018050',
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

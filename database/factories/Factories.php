<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(WebCondom\Models\Enderecos\Estado::class, function (Faker $faker) {
    return [
        'descricao'     => $faker->name,
        'sigla'         => $faker->SP,
        'codigo_ibge'    => $faker->randomNumber(2)
    ];
});

$factory->define(WebCondom\Models\Enderecos\Cidade::class, function (Faker $faker) {
    return [
        'descricao'     => $faker->name,
        'codigo_ibge'    => $faker->randomNumber(7),
        'estado_id'     => 1
    ];
});

$factory->define(WebCondom\Models\Enderecos\Endereco::class, function (Faker $faker) {
    return [
        'cep'           => $faker->randomNumber(8),
        'logradouro'    => $faker->name,
        'numero'        => $faker->randomNumber(4),
        'complemento'   => $faker->word(5),
        'bairro'        => $faker->name,
        'cidade_id'     => 1
     ];
});

$factory->define(WebCondom\Models\Condominios\CondominioTaxa::class, function (Faker $faker) {
    return [
        'descricao'     => $faker->name,
        'valor'         => $faker->randomNumber(3),
        'condominio_id' => 1
    ];
});

$factory->define(WebCondom\Models\Condominios\Sindico::class, function (Faker $faker) {
    return [
        'nome'      => $faker->name,
        'telefone'  => $faker->randomNumber(8),
        'celular'   => $faker->randomNumber(8)
    ];
});

$factory->define(WebCondom\Models\Entidades\Entidade::class, function (Faker $faker) {
    return [
        'cpf_cnpj'              => $faker->randomNumber(8),
        'nome'                  => $faker->firstNameMale,
        'apelido'               => $faker->lastName,
        'rg_ie'                 => $faker->randomNumber(8),
        'fantasia'              => $faker->name,
        'inscricao_municipal'   => $faker->randomNumber(6),
        'tipo'                  => rand(1,2) == 1 ? 1 : 2,
        'ramo_atividade'        => $faker->word(5),
        'data_abertura'         => $faker->date(),
        'nome_mae'              => $faker->name,
        'estado_civil_id'       => 1,
        'regime_casamento_id'   => 1,
        'profissao'             => $faker->word(5),
        'data_nascimento'       => $faker->date(),
        'nacionalidade'         => 'Brasileiro(a)',
        'empresa'               => $faker->company,
        'dependentes'           => $faker->randomNumber(1),
        'inss'                  => $faker->randomNumber(8),
        'telefone_principal'    => rand(1,3) == 1 ? $faker->e164PhoneNumber : '',
        'telefone_comercial'    => rand(1,5) == 1 ? $faker->e164PhoneNumber : '',
        'celular_1'             => $faker->e164PhoneNumber,
        'celular_2'             => rand(1,3) == 1 ? $faker->e164PhoneNumber : '',
        'site'                  => $faker->url,
        'email'                 => $faker->email,
    ];
});

$factory->define(WebCondom\Models\Entidades\Proprietario::class, function (Faker $faker) {
    return [
        'codigo'        => $faker->randomNumber(3),
        'entidade_id'   => 1
    ];
});

$factory->define(WebCondom\Models\Condominios\Imovel::class, function (Faker $faker) {
    return [
        'codigo'            => $faker->randomNumber(3),
        'referencia'        => $faker->word(5),
        'tipo_imovel_id'    => 1,
        'categoria_id'      => 1,
        'valor_locacao'     => $faker->randomFloat(2,800, 12000),
        'valor_venda'       => $faker->randomFloat(2, 50000, 10000000),
        'codigo_agua'       => $faker->word(5) . $faker->numberBetween(1000,9000),
        'codigo_iptu'       => $faker->word(5) . $faker->numberBetween(20100,55000),
        'codigo_energia'    => $faker->word(5) . $faker->numberBetween(135711,533000),
        'descritivo'        => $faker->sentence()
    ];
});
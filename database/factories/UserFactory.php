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
        'codigoIbge'    => $faker->randomNumber(2)
    ];
});

$factory->define(WebCondom\Models\Enderecos\Cidade::class, function (Faker $faker) {
    return [
        'descricao'     => $faker->name,
        'codigoIbge'    => $faker->randomNumber(7),
        'estado_id'     => 1
    ];
});

$factory->define(WebCondom\Models\Enderecos\Endereco::class, function (Faker $faker) {
    return [
        'logradouro'    => $faker->name,
        'numero'        => $faker->randomNumber(4),
        'cep'           => $faker->randomNumber(8),
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

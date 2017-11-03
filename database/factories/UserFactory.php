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
        'Descricao'     => $faker->name,
        'Sigla'         => $faker->SP,
        'CodigoIBGE'    => $faker->randomNumber(2)
    ];
});

$factory->define(WebCondom\Models\Enderecos\Cidade::class, function (Faker $faker) {
    return [
        'Descricao'     => $faker->name,
        'CodigoIBGE'    => $faker->randomNumber(7)
    ];
});

$factory->define(WebCondom\Models\Condominios\CondominioTaxa::class, function (Faker $faker) {
    return [
        'Descricao'     => $faker->name,
        'Valor'         => $faker->randomNumber(3)
    ];
});

$factory->define(WebCondom\Models\Condominios\Sindico::class, function (Faker $faker) {
    return [
        'Nome'      => $faker->name,
        'Telefone'  => $faker->randomNumber(8),
        'Celular'   => $faker->randomNumber(8)
    ];
});

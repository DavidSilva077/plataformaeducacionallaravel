<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    $dataInicio = $faker->dateTimeBetween('-1 year', 'now');
    $dataFim = (clone $dataInicio)->modify('+3 months');

    return [
        'titulo' => $faker->sentence(3),
        'descricao' => $faker->paragraph,
        'data_inicio' => $dataInicio->format('Y-m-d'),
        'data_fim' => $dataFim->format('Y-m-d'),
        'area' => $faker->word,
    ];
});

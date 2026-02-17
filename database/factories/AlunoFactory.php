<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Aluno;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Aluno::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'data_nascimento' => $faker->date('Y-m-d', '-10 years'),
        'password' => Str::random(10),
    ];
});

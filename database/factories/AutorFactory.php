<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Autor;
use Faker\Generator as Faker;

$factory->define(Autor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ditelindja' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'periudha' => $faker->word,
        'biografia' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'foto' => 'no-image.png',
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Libri;
use Faker\Generator as Faker;

$factory->define(Libri::class, function (Faker $faker) {
    return [
        'ISBN' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
        'titulli' => $faker->company,
        'stoku' => $faker->randomDigit,
        'foto' => 'no-image.png',
    ];
});

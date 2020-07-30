<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Zhanri;
use Faker\Generator as Faker;

$factory->define(Zhanri::class, function (Faker $faker) {
    return [
        'titulli' => $faker->company,
    ];
});

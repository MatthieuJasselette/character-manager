<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Character;
use Faker\Generator as Faker;

$factory->define(Character::class, function (Faker $faker) {
    return [
        'user_id'       => $faker->numberBetween($min = 1, $max = 6),
        'name'          => $faker->firstName,
        'description'   => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'build_url'     => $faker->url,
        'is_main'       => $faker->boolean
    ];
});

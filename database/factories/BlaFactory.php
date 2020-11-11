<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bla;
use Faker\Generator as Faker;

$factory->define(Bla::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 50),
        'body' => $faker->paragraphs(3, $asText = true),
    ];
});

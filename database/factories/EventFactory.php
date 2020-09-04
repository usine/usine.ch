<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;
use Carbon\Carbon;

$now = Carbon::now();
$maxDate = $now->addMonths(6);

$factory->define(Event::class, function (Faker $faker) use ($maxDate) {
    $start = $faker->dateTimeThisYear($maxDate);
    $end = (new Carbon($start))->addHours($faker->randomDigitNotNull());

    return [
        'title' => $faker->text($maxNbChars = 50),
        'description' => $faker->boolean() ? $faker->paragraph() : null,
        'price' => $faker->randomElement(['Prix libre', 'Entrée libre', $faker->numberBetween(0, 50) . ' CHF']),
        'start' => $start,
        'end' => $end,
    ];
});

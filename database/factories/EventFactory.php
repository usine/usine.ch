<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Venue;
use Faker\Generator as Faker;
use Carbon\Carbon;

$now = Carbon::now();
$maxDate = $now->addMonths(6);
$venues = Venue::all();

$factory->define(Event::class, function (Faker $faker) use ($maxDate, $venues) {
    $start = $faker->dateTimeThisYear($maxDate);
    $end = (new Carbon($start))->addHours($faker->randomDigitNotNull());

    return [
        'title' => $faker->text($maxNbChars = 50),
        'price' => $faker->randomElement(['Prix libre', 'Entrée libre', $faker->numberBetween(0, 50) . ' CHF']),
        'start' => $start,
        'end' => $end,
        'venue_id' => $faker->randomElement($venues),
    ];
});

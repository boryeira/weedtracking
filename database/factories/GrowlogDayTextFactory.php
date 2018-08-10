<?php

use Faker\Generator as Faker;

$factory->define(App\Models\GrowlogDayText::class, function (Faker $faker) {
    return [
        'growlog_day_id' => 0,
        'content' => $faker->text($maxNbChars = 200),
    ];
});

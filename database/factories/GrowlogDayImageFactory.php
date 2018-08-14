<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Growlogs\GrowlogDayImage::class, function (Faker $faker) {
    return [
        'growlog_day_id' => 0,
        'link' => 'test.jpg',
    ];
});

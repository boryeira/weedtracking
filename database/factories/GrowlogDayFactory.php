<?php

use Faker\Generator as Faker;

$factory->define(App\Models\GrowlogDay::class, function (Faker $faker) {
    return [
      'date' => today()->subDays(random_int(1,200)),
      'growlog_id' => 0,
    ];
});

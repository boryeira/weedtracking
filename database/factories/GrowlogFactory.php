<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Growlog::class, function (Faker $faker) {
    return [
          'user_id' => App\Models\User::inRandomOrder()->first()->id,
          'name' => $faker->name,
          'description' => $faker->text($maxNbChars = 200),
    ];
});

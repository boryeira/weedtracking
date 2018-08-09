<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Strain::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ucpc' => $faker->bothify('???????###########'),
        //
    ];
});

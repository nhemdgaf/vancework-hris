<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContributionNumber;
use Faker\Generator as Faker;

$factory->define(ContributionNumber::class, function (Faker $faker) {
    return [
        'sss'               => $faker->randomNumber(),
        'philhealth'        => $faker->randomNumber(),
        'pagibig'           => $faker->randomNumber(),
        'tin'               => $faker->randomNumber(),
    ];
});

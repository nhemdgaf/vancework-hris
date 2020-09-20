<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompleteAddress;
use Faker\Generator as Faker;

$factory->define(CompleteAddress::class, function (Faker $faker) {
    return [
        'house_number'      => $faker->buildingNumber,
        'street'            => $faker->streetName,
        'city'              => $faker->city,
        'province'          => $faker->state,
        'region'            => $faker->country,
        'zip_code'          => $faker->postcode,
    ];
});

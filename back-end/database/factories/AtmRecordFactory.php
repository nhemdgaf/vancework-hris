<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AtmRecord;
use Faker\Generator as Faker;

$factory->define(AtmRecord::class, function (Faker $faker) {
    return [
        'card_holder'       => $faker->name(),
        'card_number'       => $faker->creditCardNumber(),
        'expiry_date'       => $faker->creditCardExpirationDateString,
        'cvc'               => $faker->randomNumber($nbDigits = 3, $strict = true),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdditionalInformation;
use Faker\Generator as Faker;

$factory->define(AdditionalInformation::class, function (Faker $faker) {
    return [
        'm_first_name'      => $faker->firstName,
        'm_last_name'       => $faker->lastName,
        'm_middle_name'     => $faker->lastName,
        'm_suffix'          => $faker->suffix,
        'e_contact_person'  => $faker->name(),
        'e_mobile_number'   => $faker->phoneNumber,
    ];
});

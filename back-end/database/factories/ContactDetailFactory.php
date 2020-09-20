<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContactDetail;
use Faker\Generator as Faker;

$factory->define(ContactDetail::class, function (Faker $faker) {
    return [
        'email_address'     => $faker->email,
        'phone_number'      => $faker->phoneNumber,
        'mobile_number'     => $faker->phoneNumber,
    ];
});

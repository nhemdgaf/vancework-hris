<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Faker\Provider\en_HK\Address;

$factory->define(Employee::class, function (Faker $faker) {
    $dob = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = 'UTC');
    $dob = $dob->format("Y-m-d");
    $now = date_create('now');
    $now = $now->format("Y-m-d");
    $age = date_diff(date_create($dob), date_create('now'))->y;
    return [
        'emp_num'           => $faker->unique()->randomNumber($nbDigits = 4, $strict = false),
        'last_name'         => $faker->lastName(),
        'first_name'        => $faker->firstName(),
        'middle_name'       => $faker->optional()->lastName(),
        'suffix'            => $faker->optional()->suffix(),
        'date_of_birth'     => $dob,
        'age'               => $age,
        'gender'            => $faker->randomElement($array = array(0, 1)),
        'religion'          => $faker->optional()->randomElement($array = array('Christian', 'Catholic', 'Baptist')),
        'citizenship'       => $faker->optional()->randomElement($array = array('Filipino', 'American')),
        'place_of_birth'    => $faker->city,
        'civil_status'      => $faker->randomElement($array = array('Single', 'Married', 'Widowed', 'Legally Separated', 'Others'))
    ];
});

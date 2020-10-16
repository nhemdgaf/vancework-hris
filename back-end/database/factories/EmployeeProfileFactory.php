<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeProfile;
use Faker\Generator as Faker;

$factory->define(EmployeeProfile::class, function (Faker $faker) {
    $date_hired = $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = 'UTC');
    $date_hired->format("Y-m-d");
    return [
        'position'              => $faker->randomElement($array = array('Service Crew', 'Cashier', 'Manager')),
        'employment_status'     => $faker->randomElement($array = array('Active', 'Suspended', 'Blacklisted')),
        'date_hired'            => $date_hired,
        'store_assignment'      => $faker->randomElement($array = array('SM Tunasan', 'San Pedro United', 'SM Sta. Rosa', 'Muntinlupa Bayan')),
        'immediate_supervisor'  => $faker->randomElement($array = array('Seanbert Madronero', 'Andrea Recuyo', 'Joshua Guiaz', 'Gene Sedan')),
        'basic_pay'             => '537',
        'ecola'                 => $faker->randomNumber($nbDigits = 3, $strict = false),
        'billing_group'         => $faker->randomElement($array = array('BDO', 'BPI', 'Master Card', 'Paypal')),
        'client_group'          => $faker->randomElement($array = array('Client 1', 'Client 2', 'Client 3', 'Client 4')),
        'mcrs'                  => $faker->randomElement($array = array('MCRs 1', 'MCRs 2')),
        'payroll_code'          => $faker->randomNumber($nbDigits = 5, $strict = true),
    ];
});

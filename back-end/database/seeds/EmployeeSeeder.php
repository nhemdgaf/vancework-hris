<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class, 1000)->create()->each(function ($employee) {
            $employee->contactdetail()->save(factory(App\ContactDetail::class)->make());
            $employee->completeaddress()->save(factory(App\CompleteAddress::class)->make());
            $employee->additionalinformation()->save(factory(App\AdditionalInformation::class)->make());
            $employee->contributionnumber()->save(factory(App\ContributionNumber::class)->make());
            $employee->employeeprofile()->save(factory(App\EmployeeProfile::class)->make());
            $employee->atmrecord()->save(factory(App\AtmRecord::class)->make());
        });
    }
}

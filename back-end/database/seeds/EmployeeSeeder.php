<?php

use App\Employee;

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
        factory(Employee::class, 1000)->create()->each(function ($employee) {
            $employee->contactdetail()->save(factory(ContactDetail::class)->make());
            $employee->completeaddress()->save(factory(CompleteAddress::class)->make());
            $employee->additionalinformation()->save(factory(AdditionalInformation::class)->make());
            $employee->contributionnumber()->save(factory(ContributionNumber::class)->make());
            $employee->employeeprofile()->save(factory(EmployeeProfile::class)->make());
            $employee->atmrecord()->save(factory(AtmRecord::class)->make());
        });
    }
}

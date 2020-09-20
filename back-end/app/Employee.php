<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Make all database column fillable.
    protected $guarded = [];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'emp_num';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    public function contactdetail(){
        return $this->hasOne(ContactDetail::class, 'emp_num');
    }

    public function completeaddress()
    {
        return $this->hasOne(CompleteAddress::class, 'emp_num');
    }

    public function additionalinformation()
    {
        return $this->hasOne(AdditionalInformation::class, 'emp_num');
    }

    public function contributionnumber()
    {
        return $this->hasOne(ContributionNumber::class, 'emp_num');
    }

    public function employeeprofile()
    {
        return $this->hasOne(EmployeeProfile::class, 'emp_num');
    }

    public function atmrecord()
    {
        return $this->hasOne(AtmRecord::class, 'emp_num');
    }
}

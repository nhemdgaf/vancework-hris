<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompleteAddress extends Model
{
    // Make all database column fillable.
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_num');
    }
}

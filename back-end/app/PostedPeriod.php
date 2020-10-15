<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostedPeriod extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Make all database column fillable.
    protected $guarded = [];
}

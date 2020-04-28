<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['department_id', 'user_id','attendance_date', 'attendance_status'];
}

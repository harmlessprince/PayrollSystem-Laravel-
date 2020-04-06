<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'designation_name', 'department_id'
    ];

    

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = ['leave_type'];
    public function user()
    {
        return $this->belongsToMany('App\User')->withPivot('leave_type', 'from_date', 'to_date', 'description','status');
    }
}

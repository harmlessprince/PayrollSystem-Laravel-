<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = ['user_id','leave_type', 'from_date', 'to_date', 'description'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

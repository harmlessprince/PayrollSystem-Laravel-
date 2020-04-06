<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{


    public function designations()
    {
        return $this->hasMany('App\Designation');
    }
    

    public function users()
    {
        return $this->hasMany('App\User');
    }

  
}


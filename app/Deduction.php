<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $fillable = [
        'deduction_name'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}

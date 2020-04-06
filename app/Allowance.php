<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $fillable = [
        'allowance_name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

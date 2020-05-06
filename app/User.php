<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Defining 
    public function account()
    {
        return $this->hasOne('App\Account');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }



    // Defining Many to Many Relationship 

    public function allowances()
    {
        return $this->belongsToMany(Allowance::class)->withPivot('allowance_name','allowance_value')->withTimestamps();
    }

    
    public function deductions()
    {
        return $this->belongsToMany(Deduction::class)->withPivot('deduction_name','deduction_value')->withTimestamps();
    }

    public function payslips()
    {
        return $this->hasMany('App\Payslip');
    }

    public function leaves()
    {
        return $this->hasMany('App\Leave');
    }

}

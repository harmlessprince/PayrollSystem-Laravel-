<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    protected $fillable = ['user_id','basic_salary', 'total_salary','total_allowance','total_deduction','status','payslip_year', 'payslip_month','comment','methodOfPayment'];
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

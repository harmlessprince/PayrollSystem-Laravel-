<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeductionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deductions')->insert([
            'deduction_name'=>'Health Insurance '
        ]);
        DB::table('deductions')->insert([
            'deduction_name'=>'Life Insurance'
        ]);
        DB::table('deductions')->insert([
            'deduction_name'=>'Profit-Sharing'
        ]);
        DB::table('deductions')->insert([
            'deduction_name'=>'Pension'
        ]);
        DB::table('deductions')->insert([
            'deduction_name'=>'Union Dues'
        ]);
    }
}

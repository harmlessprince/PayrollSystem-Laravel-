<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'user_id'=>'1',
            'account_name'=>'Admin Account',
            'account_number'=>'023456889',
            'bank_name'=>'PiggyVest Bank'
        ]);

        DB::table('accounts')->insert([
            'user_id'=>'2',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'CashCow Bank'
        ]);
    }
}

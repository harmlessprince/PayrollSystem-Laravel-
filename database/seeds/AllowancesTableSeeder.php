<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllowancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allowances')->insert([
            'allowance_name'=>'Annual investment allowance'
        ]);
        DB::table('allowances')->insert([
            'allowance_name'=>'Writing down allowance'
        ]);
        DB::table('allowances')->insert([
            'allowance_name'=>'Small pools allowance'
        ]);
        DB::table('allowances')->insert([
            'allowance_name'=>'First-year allowance'
        ]);
        DB::table('allowances')->insert([
            'allowance_name'=>'Balancing allowance'
        ]);
    }
}

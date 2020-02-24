<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            'user_id'=>'1',
            'department_id'=>'1',
            'designation_name'=>'HR'
        ]);

        DB::table('designations')->insert([
            'user_id'=>'2',
            'department_id'=>'2',
            'designation_name'=>'HR'
        ]);
    }
}

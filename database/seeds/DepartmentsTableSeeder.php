<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('departments')->insert([
            'user_id'=>'1',
            'department_name'=>'Finanace'
        ]);
        DB::table('departments')->insert([
            'user_id'=>'2',
            'department_name'=>'Engineering'
        ]);
    }
}

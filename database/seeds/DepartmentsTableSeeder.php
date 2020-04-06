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
            'department_name'=>'Information Clerks'
        ]);
        DB::table('departments')->insert([
            'department_name'=>'Material Recording Clerks'
        ]);
        DB::table('departments')->insert([
            'department_name'=>'Bill and Account Collectors'
        ]);
        DB::table('departments')->insert([
            'department_name'=>'Financial Clerks'
        ]);
        DB::table('departments')->insert([
            'department_name'=>'General Office Clerks'
        ]);
    }
}

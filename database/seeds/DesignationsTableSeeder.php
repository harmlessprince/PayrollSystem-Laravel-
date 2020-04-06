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
        //Information Clerks
        DB::table('designations')->insert([
            'department_id' => '1',
            'designation_name' => 'Data Entry'
        ]);

        DB::table('designations')->insert([
            'department_id' => '1',
            'designation_name' => 'Information Clerk'
        ]);

        DB::table('designations')->insert([
            'department_id' => '1',
            'designation_name' => 'Administrative Manager'
        ]);
        DB::table('designations')->insert([
            'department_id' => '1',
            'designation_name' => 'Records Management Analyst'
        ]);
        DB::table('designations')->insert([
            'department_id' => '1',
            'designation_name' => 'Support Assistant'
        ]);

        //Material Recording Clerks
        DB::table('designations')->insert([
            'department_id' => '2',
            'designation_name' => 'Facility Manager'
        ]);

        DB::table('designations')->insert([
            'department_id' => '2',
            'designation_name' => 'Material Recorder'
        ]);


        //Bill and Account Collectors
        DB::table('designations')->insert([
            'department_id' => '3',
            'designation_name' => 'Account Collector'
        ]);
        DB::table('designations')->insert([
            'department_id' => '3',
            'designation_name' => 'Bill Collector'
        ]);

        DB::table('designations')->insert([
            'department_id' => '3',
            'designation_name' => 'Billing Coordinator'
        ]);


        //Financial Clerks
        DB::table('designations')->insert([
            'department_id' => '4',
            'designation_name' => 'Accounting Clerk'
        ]);

        DB::table('designations')->insert([
            'department_id' => '4',
            'designation_name' => 'Auditing Clerk'
        ]);

        DB::table('designations')->insert([
            'department_id' => '4',
            'designation_name' => 'Bookkeeper'
        ]);
        DB::table('designations')->insert([
            'department_id' => '4',
            'designation_name' => 'Credit Clerk'
        ]);
        DB::table('designations')->insert([
            'department_id' => '4',
            'designation_name' => 'Financial Clerk'
        ]);


        //General Office Clerks
        DB::table('designations')->insert([
            'department_id' => '5',
            'designation_name' => 'Billing Clerk'
        ]);

        DB::table('designations')->insert([
            'department_id' => '5',
            'designation_name' => 'Office Clerk'
        ]);

        DB::table('designations')->insert([
            'department_id' => '5',
            'designation_name' => 'Staff Assistant'
        ]);
        DB::table('designations')->insert([
            'department_id' => '5',
            'designation_name' => 'Typist'
        ]);
        DB::table('designations')->insert([
            'department_id' => '5',
            'designation_name' => 'Word Processor'
        ]);
    }
}

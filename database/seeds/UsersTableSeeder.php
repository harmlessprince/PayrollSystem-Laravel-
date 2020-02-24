<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use PhpParser\Node\Expr\Cast\Int_;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'employee_name' => "Admin",
            'email' => 'admin'.'@gmail.com',
            'password' => Hash::make('123456'),
            'date_of_birth'=>Carbon::create('2020', '01', '01'),
            'gender'=>'male',
            'phone_number'=>'09086556010',
            'nationality'=>'Nigerian',
            'address'=>'20, Ogunsolu, Street',
            'marital_status'=>'single',
        ]);

        DB::table('users')->insert([
            'employee_name' => "User",
            'email' => 'user'.'@gmail.com',
            'password' => Hash::make('123456'),
            'date_of_birth'=>Carbon::create('2020', '01', '01'),
            'gender'=>'male',
            'phone_number'=>'0908045010',
            'nationality'=>'Ghanian',
            'address'=>'20, Ogunsolu, Street',
            'marital_status'=>'single',
        ]);
    }
}

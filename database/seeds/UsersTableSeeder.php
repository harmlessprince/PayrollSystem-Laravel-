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
            'employeeName' => "Employee",
            'email' => 'user'.'@gmail.com',
            'password' => Hash::make('123456'),
            'dateOfBirth'=>Carbon::create('2020', '01', '01'),
            'gender'=>'male',
            'phone_number'=>'09086556010',
            'nationality'=>'Nigerian',
            'address'=>'20, Ogunsolu, Street',
            'maritalStatus'=>'single',
            'department'=>'Technical',
            'designation'=>'HOD',
            'resumptionDate'=>Carbon::create('2020', '01', '01'),
            'basicSalary'=>'2000',
            'deductionType'=>'tax',
            'totalSalary'=>'1700',
            'accountName'=>'Adewuyi Taofeeq O.',
            'accountNumber'=>'0236469309',
            'bankName'=>'Zenith',
        ]);
    }
}

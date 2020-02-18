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
            'employeeName' => "Admin",
            'employee_id'=> '1',
            'email' => 'user'.'@gmail.com',
            'password' => Hash::make('123456'),
            'dateOfBirth'=>Carbon::create('2020', '01', '01'),
            'gender'=>'male',
            'image'=>'akjdniuhd',
            'phone-number'=>'09086556010',
            'nationality'=>'Nigerian',
            'address'=>'20, Ogunsolu, Street',
            'maritalStatus'=>'single',
            'department'=>'Technical',
            'designation'=>'HOD',
            'resumptionDate'=>Carbon::create('2020', '01', '01'),
            'employeeStatus'=>'active',
            'basicSalary'=>'2000',
            'deductionType'=>'tax',
            'taxUnit'=>'200',
            'pensionUnit'=>'100',
            'totalSalary'=>'1700',
            'accountName'=>Str::random(5),
            'accountNumber'=>'123456',
            'bankName'=>'Zenith',
        ]);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employeeName');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('nationality');
            $table->string('address');
            $table->string('maritalStatus');
            $table->string('user_photo')->default('default.jpeg');
            // $table->string('employee_id');
            $table->string('department');
            $table->string('designation');
            $table->date('resumptionDate');
            $table->date('LeavingDate')->nullable();
            $table->enum('employeeStatus', ['active', 'inactive'])->default('inactive');
            $table->integer('basicSalary');
            $table->string('deductionType');
            $table->integer('taxUnit')->nullable();
            $table->integer('pensionUnit')->nullable();
            $table->integer('totalSalary');
            $table->string('accountName');
            $table->string('accountNumber');
            $table->string('bankName');
            $table->string('email')->unique();
            $table->enum('role', ['employee', 'admin'])->default('employee');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

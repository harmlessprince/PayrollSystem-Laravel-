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
            $table->string('employee_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('nationality');
            $table->string('address');
            $table->string('marital_status');
            $table->enum('employee_status', ['active', 'inactive'])->default('active');
            $table->enum('role', ['employee', 'admin'])->default('admin');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id');
            $table->string('user_photo')->default('default.jpeg')->nullable();
            $table->date('resumption_date')->default(now());
            $table->date('leaving_date')->nullable();
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

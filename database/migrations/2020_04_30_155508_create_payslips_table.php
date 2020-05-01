<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('payslip_id')->unique();
            $table->bigInteger('user_id');
            $table->integer('basic_salary');
            $table->integer('total_salary');
            $table->integer('total_allowance');
            $table->integer('total_deduction');
            $table->year('payslip_year');
            $table->string('payslip_month');
            $table->boolean('status')->default(0);
            $table->string('methodOfPayment');
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('payslips');
    }
}

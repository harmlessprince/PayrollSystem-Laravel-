<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deduction_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deduction_id');
            $table->unsignedBigInteger('user_id');
            $table->string('deduction_name');
            $table->integer('deduction_value');
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
        Schema::dropIfExists('deduction_user');
    }
}

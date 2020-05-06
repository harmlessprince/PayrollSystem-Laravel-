<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('leave_id');
            $table->unsignedInteger('user_id');
            $table->string('leave_type');
            $table->date('from_date');
            $table->date('to_date');
            $table->longText('description');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('leave_user');
    }
}

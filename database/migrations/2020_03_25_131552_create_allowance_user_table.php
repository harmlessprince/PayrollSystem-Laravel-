<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowance_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('allowance_id');
            $table->unsignedBigInteger('user_id');
            $table->string('allowance_name');
            $table->integer('allowance_value');
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
        Schema::dropIfExists('allowance_user');
    }
}
